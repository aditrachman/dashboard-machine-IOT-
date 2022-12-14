<!--- Source : https://pelopers.wordpress.com/2015/12/29/membuat-timer-dengan-php-dan-jquery/  -->

<!DOCTYPE html>
<html>
<head>
<style>
    body {
        background-color:gray;
    }
    h1 {
        font-size: 5em;
    }
 
    button {
        font-size: 25px;
        width: 130px;
        height: 50px;
        border-radius: 3px;
    }
 
    #startPause {
        background-color: blue;
        border-color: blue;
    }
 
    #reset {
        background-color: yellow;
        border-color: yellow;
    }
 
    .container {
        margin: auto;
        margin-top: 200px;
        width: 400px;
        height: 400px;
    }
    #controls {
        margin-left: 7px;
        width: 310px;
        height:70px;
    }
</style>
</head>
<body>
<script>
var time = 0;
var running = 0;
function startPause(){
    if(running == 0){
        running = 1;
        increment();
    document.getElementById("start").innerHTML = "Pause";
    document.getElementById("startPause").style.backgroundColor = "red";    
    document.getElementById("startPause").style.borderColor = "red";
    }
    else{
        running = 0;
    document.getElementById("start").innerHTML = "Resume";  
    document.getElementById("startPause").style.backgroundColor = "green";  
    document.getElementById("startPause").style.borderColor = "green";
    }
}
function reset(){
    running = 0;
    time = 0;
    document.getElementById("start").innerHTML = "Start";
    document.getElementById("output").innerHTML = "0:00:00:00";
    document.getElementById("startPause").style.backgroundColor = "green";  
    document.getElementById("startPause").style.borderColor = "green";
}
function increment(){
    if(running == 1){
        setTimeout(function(){
            time++;
            var mins = Math.floor(time/10/60);
            var secs = Math.floor(time/10 % 60);
            var hours = Math.floor(time/10/60/60); 
            var tenths = time % 10;
            if(mins < 10){
                mins = "0" + mins;
            } 
            if(secs < 10){
                secs = "0" + secs;
            }
            document.getElementById("output").innerHTML = hours + ":" + mins + ":" + secs + ":" + tenths + "0";
            increment();
        },100)
    }
}
</script>
<div class="container">
<h1><p id="output"><b>0:00:00:00</b></p></h1>
<div id="controls" align="center">
    <button id= "startPause" onclick="startPause()"><b id="start">Mulai</b></button>
    <button onclick="reset()" id="reset"><b id="reset"> Ulang</b></button>
</div>
</div>
</body>
</html>