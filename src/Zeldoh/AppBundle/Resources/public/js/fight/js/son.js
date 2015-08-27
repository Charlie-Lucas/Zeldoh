$(document).ready(function(){
    $(".audioDemo").trigger('load');
    $(".audioDemo").load();
    $(".audioDemo").bind("load",function(){
        console.log("Chargement ok.");
    });
    $("#fight").click(function(){
        console.log("play");
        $(".audioDemo").trigger('play');
    });
});

<audio class="audioDemo" controls style="display: none;"> 
            <source src="sound/fight.mp3" type="audio/mp3">
         </audio>
        <button id="fight">Combat</button>