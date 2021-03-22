<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color:blue;">
    <h1 style="color:white">Pai</h1>
    <span style="color:white">MensagemPai:</span>
    <input id="msg" style="width:400px;"></h1>
    <button onclick="btRedirecionar()">  Envia mensagem filho</button>
    <br>
    <span style="color:white">referenceid:</span>
        <input id="referenceId" value="0">
        <br>
    <iframe name="example" style=" width:500px; heigth:800px;"  id="qrcodeURL" src="http://localhost/comunicacaoiframe/filho.php?referenceId=10123" frameborder="0"></iframe>
</body>

<script type="text/javascript">
    window.addEventListener("message", function(event) {
        debugger;
        try {
            var retorno = JSON.parse(JSON.stringify(event.data));
            var referenceId =  document.getElementById('referenceId');
            document.getElementById('msg').value = JSON.stringify(event.data);
        let win = window.frames.example;

            win.postMessage('{"referenceId":"'+referenceId.value+'"}', "*");
        } catch (error) {
            console.log(error);
        }
    });
    function btRedirecionar(){
        let win = window.frames.example;
        var referenceId =  document.getElementById('referenceId');
        win.postMessage('{"referenceId":"'+referenceId.value+'"}', "*");
    }
</script>
</html>