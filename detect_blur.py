import sys
import cv2
import numpy as np

class BlurDetector(object):
    def __init__(self, downsampling_factor=4, num_scales=4, scale_start=3, entropy_filt_kernel_sze=7, sigma_s_RF_filter=15, sigma_r_RF_filter=0.25, num_iterations_RF_filter=3, show_progress=False):
        self.downsampling_factor = downsampling_factor
        self.num_scales = num_scales
        self.scale_start = scale_start
        self.entropy_filt_kernel_sze = entropy_filt_kernel_sze
        self.sigma_s_RF_filter = sigma_s_RF_filter
        self.sigma_r_RF_filter = sigma_r_RF_filter
        self.num_iterations_RF_filter = num_iterations_RF_filter
        self.scales = self.createScalePyramid()
        self.__freqBands = []
        self.__dct_matrices = []
        self.freq_index = []
        self.show_progress = show_progress

    def createScalePyramid(self):
        scales = []
        for i in range(self.num_scales):
            scales.append((2**(self.scale_start + i)) - 1)
        return(scales)

    def computeImageGradientMagnitude(self, img):
        __sobelx = cv2.Sobel(img, cv2.CV_64F, 1, 0, borderType=cv2.BORDER_REFLECT)
        __sobely = cv2.Sobel(img, cv2.CV_64F, 0, 1, borderType=cv2.BORDER_REFLECT)
        __magnitude = np.sqrt(__sobelx ** 2.0 + __sobely ** 2.0)
        return(__magnitude)

    def __computeFrequencyBands(self):
        for current_scale in self.scales:
            matrixInds = np.zeros((current_scale, current_scale))
            for i in range(current_scale):
                matrixInds[0 : max(0, int(((current_scale-1)/2) - i +1)), i] = 1
            for i in range(current_scale):
                if (current_scale-((current_scale-1)/2) - i) <= 0:
                    matrixInds[0:current_scale - i - 1, i] = 2
                else:
                    matrixInds[int(current_scale - ((current_scale - 1) / 2) - i - 1): int(current_scale - i - 1), i]=2;
            matrixInds[0, 0] = 3
            self.__freqBands.append(matrixInds)

    def __dctmtx(self, n):
        [mesh_cols, mesh_rows] = np.meshgrid(np.linspace(0, n-1, n), np.linspace(0, n-1, n))
        dct_matrix = np.sqrt(2/n) * np.cos(np.pi * np.multiply((2 * mesh_cols + 1), mesh_rows) / (2*n));
        dct_matrix[0, :] = dct_matrix[0, :] / np.sqrt(2)
        return(dct_matrix)

    def __createDCT_Matrices(self):
        if(len(self.__dct_matrices) > 0):
            raise TypeError("dct matrices are already defined. Redefinition is not allowed.")
        for curr_scale in self.scales:
            dct_matrix = self.__dctmtx(curr_scale)
            self.__dct_matrices.append(dct_matrix)

    def __getDCTCoefficients(self, img_blk, ind):
        rows, cols = np.shape(img_blk)
        D = self.__dct_matrices[ind]
        dct_coeff = np.matmul(np.matmul(D, img_blk), np.transpose(D))
        return(dct_coeff)

    def entropyFilt(self, img):
        from skimage.filters.rank import entropy
        from skimage.morphology import square
        return(entropy(img, square(self.entropy_filt_kernel_sze)))

    def computeScore(self, weighted_local_entropy, T_max):
        min_val = weighted_local_entropy.min()
        weighted_T_Max = weighted_local_entropy - min_val
        max_val = weighted_local_entropy.max()
        weighted_T_Max = weighted_local_entropy / max_val
        score = np.median(weighted_local_entropy)
        return(score)

    def TransformedDomainRecursiveFilter_Horizontal(self, I, D, sigma):
        import copy
        a = np.exp(-np.sqrt(2) / sigma)
        F = copy.deepcopy(I)
        V = a ** D
        rows, cols = np.shape(I)
        for i in range(1, cols):
            F[:, i] = F[:, i] + np.multiply(V[:, i], (F[:, i-1] - F[:, i]))
        for i in range(cols-2, 1, -1):
            F[:, i] = F[:, i] + np.multiply(V[:, i+1], (F[:, i + 1] - F[:, i]))
        return(F)

    def RF(self, img, joint_img):
        import copy
        if(len(joint_img) == 0):
            joint_img = img
        joint_img = joint_img.astype('float64')
        joint_img = joint_img / 255
        if(len(np.shape(joint_img)) == 2):
            cols, rows = np.shape(joint_img)
            channels = 1
        elif(len(np.shape(joint_img)) == 3):
            cols, rows, channels = np.shape(joint_img)
        dIcdx = np.diff(joint_img, n=1, axis=1)
        dIcdy = np.diff(joint_img, n=1, axis=0)
        dIdx = np.zeros((cols, rows));
        dIdy = np.zeros((cols, rows));
        dIdx[:, 1::] = abs(dIcdx)
        dIdy[1::, :] = abs(dIcdy)
        dHdx = (1/3) * np.sum(dIdx, axis=2)
        dVdy = (1/3) * np.sum(dIdy, axis=2)
        dIdx = np.zeros((cols, rows))
        dIdy = np.zeros((cols, rows))
        dIdx[:, 1::] = dHdx
        dIdy[1::, :] = dVdy
        dHdx = copy.deepcopy(dIdx)
        dVdy = copy.deepcopy(dIdy)
        dIdx = (dHdx + dVdy) / 2.0
        dIdx = (dIdx + dVdy) / 2.0
        J = copy.deepcopy(img)
        sigma_H = self.sigma_s_RF_filter
        sigma_r = self.sigma_r_RF_filter
        num_iterations = self.num_iterations_RF_filter
        sigma_H = sigma_H * np.sqrt(3) * (2 ** (num_iterations - 1)) / np.sqrt(4 ** num_iterations - 1)
        for iter in range(num_iterations):
            J = self.TransformedDomainRecursiveFilter_Horizontal(J, dHdx, sigma_H)
            J = np.transpose(J)
            dHdx = np.transpose(dHdx)
            J = self.TransformedDomainRecursiveFilter_Horizontal(J, dVdy, sigma_H)
            J = np.transpose(J)
            dHdx = np.transpose(dHdx)
        return(J)

    def detectBlur(self, img):
        from skimage.filters.rank import entropy
        from skimage.morphology import square
        img = img.astype('float64')
        rows, cols = np.shape(img)
        if rows < 256 or cols < 256:
            raise ValueError("Input image size is less than 256 pixels. Image should be atleast 256 pixels.")
        if len(np.shape(img)) > 2:
            img = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
        img = cv2.resize(img, (0, 0), fx=1.0 / self.downsampling_factor, fy=1.0 / self.downsampling_factor)
        rows, cols = np.shape(img)
        self.__computeFrequencyBands()
        self.__createDCT_Matrices()
        for i in range(self.num_scales):
            filt = np.zeros((rows, cols))
            filt = self.entropyFilt(img)
            final_map = self.RF(filt, img)
            current_scale = self.scales[i]
            coeff = self.__getDCTCoefficients(final_map, i)
            entropy_map = np.zeros(np.shape(final_map))
            current_band = self.__freqBands[i]
            low_freq_indexes = (current_band == 1)
            high_freq_indexes = (current_band == 2)
            low_freq_coeffs = coeff[low_freq_indexes]
            high_freq_coeffs = coeff[high_freq_indexes]
            high_freq_energy = np.sum(np.power(high_freq_coeffs, 2))
            low_freq_energy = np.sum(np.power(low_freq_coeffs, 2))
            entropy_map[low_freq_indexes] = 1
            entropy_map[high_freq_indexes] = (high_freq_energy / (high_freq_energy + low_freq_energy))
            entropy_map = cv2.resize(entropy_map, (0, 0), fx=self.downsampling_factor, fy=self.downsampling_factor)
        score = self.computeScore(entropy_map, self.scales[i])
        return score, entropy_map

def main(image_path):
    img = cv2.imread(image_path, cv2.IMREAD_GRAYSCALE)
    blur_detector = BlurDetector()
    score, final_map = blur_detector.detectBlur(img)
    
    threshold = 0.1  # Tentukan threshold sesuai kebutuhan
    if score < threshold:
        print("Gambar kabur")
    else:
        print("Gambar tidak kabur")

if __name__ == "__main__":
    if len(sys.argv) < 2:
        print("Usage: python detect_blur.py <image_path>")
    else:
        main(sys.argv[1])
