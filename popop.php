<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="coba.css">
</head>
<body>
        <button type="submit" class="btn btn-primary me-2" onclick="openPopup()">Submit</button>
            <div class="popup" id="popup">
                <img src="img/tick.png">
                <h2>Permohonan Rekomendasi Berhasil Dikirim</h2>
                <p>Cek Secara Berkala Surat Rekomendasi Anda dalam Waktu 1 x 24 Jam</p>
                <button type="button"  onclick="closePopup()">OK</button>
            </div>
        
        <script>
            let popup =document.getElementById("popup");
        function openPopup(){
            popup.classList.add("open-popup");
        }
        function closePopup(){
            popup.classList.remove("open-popup");
        }
        </script>
</body>
</html>