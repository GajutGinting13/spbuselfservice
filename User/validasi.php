<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'head.php';
    session_start();
    $nama = $_SESSION['nama'];
    $jenis = $_POST['jenis'];
    $jumlah = $_POST['jumlah'];
    ?>
    <style>
        #video-container {
            position: relative;
            width: 100%;
            height: 70vh;
        }

        #qr-video {
            width: 100%;
            height: 100%;
        }

        #qr-result {
            margin-top: 10px;
            font-size: 18px;
        }

        body {
            background-color: #06d6a0;
        }

        .corner-border {
            position: absolute;
            width: 30px;
            height: 30px;
            border: 6px solid white;
        }

        .corner-border.top-left {
            top: 0;
            left: 0;
            border-right: none;
            border-bottom: none;
        }

        .corner-border.top-right {
            top: 0;
            right: 0;
            border-left: none;
            border-bottom: none;
        }

        .corner-border.bottom-left {
            bottom: 0;
            left: 0;
            border-right: none;
            border-top: none;
        }

        .corner-border.bottom-right {
            bottom: 0;
            right: 0;
            border-left: none;
            border-top: none;
        }
    </style>
</head>

<body>
    <div id="video-container" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
        <video id="qr-video" width="100%" height="100%" playsinline></video>
        <div class="corner-border top-left"></div>
        <div class="corner-border top-right"></div>
        <div class="corner-border bottom-left"></div>
        <div class="corner-border bottom-right"></div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script>
        const key = CryptoJS.enc.Utf8.parse('1234567890123456'); // 16-byte key
        const iv = CryptoJS.enc.Utf8.parse('1234567890123456'); // 16-byte IV

        function encryptText(plainText) {
            const encrypted = CryptoJS.AES.encrypt(plainText, key, {
                iv: iv
            });
            return encrypted.toString();
        }

        function decryptText(encryptedText) {
            const decrypted = CryptoJS.AES.decrypt(encryptedText, key, {
                iv: iv
            });
            return decrypted.toString(CryptoJS.enc.Utf8);
        }
        // const encryptedText = encryptText("proses.php?spbu=1");
        // console.log(encryptedText);
        // Hasil Enkripsi = "6JXcZ6L839hD2HmK9AmEs808svSWeJtBNyisuno5Dys=";
        // Mulai Scan
        const video = document.getElementById('qr-video');
        let scanner = new Instascan.Scanner({
            video,
            mirror: false
        });

        scanner.addListener('scan', function(content) {
            if (content == "6JXcZ6L839hD2HmK9AmEs808svSWeJtBNyisuno5Dys=") {
                const decryptedText = decryptText(content);
                const url = "https://gaspas.gaject.online/User/" + decryptedText + "&jenis=<?= $jenis ?>&jumlah=<?= $jumlah ?>";
                window.location.href = url;
            } else {
                alert("QRcode Tidak Dikenal.");
            }
        });

        function startScanner() {
            Instascan.Camera.getCameras().then(function(cameras) {
                if (cameras.length > 0) {
                    const constraints = {
                        video: {
                            deviceId: {
                                exact: cameras[cameras.length - 1].deviceId
                            },
                            facingMode: 'environment'
                        }
                    };
                    scanner.start(cameras[cameras.length - 1], constraints);
                } else {
                    console.error('Tidak ada kamera yang ditemukan.');
                }
            }).catch(function(e) {
                console.error(e);
            });
        }
        startScanner();
    </script>
</body>

</html>