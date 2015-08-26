var currentx = '';
var currenty='';

$(document).ready(function () {
    var datapropdefault = $('#d');

    currentx = datapropdefault.data('x');
    currenty = datapropdefault.data('y'); //on va chercher les machins definis en dur
    
   

    
//+or

    window.addEventListener("keydown", function (event) {
        if (event.defaultPrevented) {
            return; // Should do nothing if the key event was already consumed.
        }
//dans chaque case : function regarderCase() pour bool : 1:terrain ok, 0 : pas ok (wall)
//a mettre hors du document.ready, et à appeler dans le switch
        switch (event.key) {
            case "ArrowDown":
                
                currenty++;
                rafraichirPos();
                //if y = 0 : ajax changer map bas
                //if mur : pa descendre
                break;
            case "ArrowUp":
                // Do something for "up arrow" key press.
                currenty --;
                rafraichirPos();
                //if y = 16, ajax changer map
                //if mur : pas monter
                break;
            case "ArrowLeft":
                currentx --;
                rafraichirPos();
                //if mur : pas gauche, if x = 0 changer map
                
                break;
            case "ArrowRight":
                currentx ++;
                rafraichirPos();
                //if mur : pas droite, if x=16, changer map
                
                break;
            case "Enter":
                //metre jeu en pause et sortir le clavier du focus
             
                break;
            
            default:
                return;
        }

        event.preventDefault();
    }, true);
});


function rafraichirPos(){
   // $('#perso')
    $('#ctn').find('li:nth-child('+currenty+')').find('ul:nth-child('+currentx+')').append($('#perso'));
    
            //$('#perso').attribuer x*witdh et y*height
            //appeler un ajax pour rafraichir la pos en bdd
}
