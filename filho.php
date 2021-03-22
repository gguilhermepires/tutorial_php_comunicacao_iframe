<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color:white;">
    <h1>Filho</h1>
    <input  id="msg"></p>
    <button onclick="envia">envia mssg</button>
   
</body>
<script>
            var envia = true;
            debugger;
            var referenceId = "<?php echo empty($referenceId)? "0": $referenceId ?>";

            setInterval(function(){
                if(envia == true){
                    parent.postMessage('{"referenceId":"'+referenceId+'"}', "*");
                }
            },100);
            
            window.addEventListener("message", function(event) {
              
                try {
                    debugger;
                  
                    if(envia ==true){
                        alert("recebi")
                        var retorno = JSON.parse(JSON.stringify(event.data));
                        var referenceId =  document.getElementById('referenceId');
                        document.getElementById('msg').value = JSON.stringify(event.data);
                        parent.postMessage('{"referenceId":"'+"0"+'"}', "*");
                        envia = false;
                    }
                   
                } catch (error) {
                    
                }
                
            });
function envia(){
    if(referenceId)
        parent.postMessage('{"referenceId":"'+referenceId+'"}', "*");
    else
        parent.postMessage('{"referenceId":"'+"0"+'"}', "*");

}
           
    </script>
</html>