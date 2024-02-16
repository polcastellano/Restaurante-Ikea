<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>

</head>
<body>
    <div id="qrcode"></div>
</body>
</html>


<script>
    let qrcode = new QRCode(document.getElementById("qrcode"), {
                text: "http://localhost/DAW/ikea/?controller=usuario&action=verPedido",
                width: 128,
                height: 128,
                colorDark : "#000000",
                colorLight : "#ffffff",
                correctLevel : QRCode.CorrectLevel.H
            });
</script>