function Game(){
    this.message = "";            // Le message du jeu
    this.characters = [];             // Array des joueurs
    this.img = "";
    this.view = "";
    this.observers = [];
}

Game.prototype.notify = function(action) {
    for(var key in this.observers){
        var observable  = this.observers[key];
        observable.update(action);
    }
};

Game.prototype.attach = function(observer){
    this.observers.push(observer);
};

Game.prototype.start = function(){
    var template = "";
    var Obj = this;
    $.get( "./templates/game.html", function( data ) {
      template = $(data);
      // Quand la page html est récupéré on ajoute les events.
    }).always(function() {
        Obj.view = template.clone();
        Obj.message = "Combat";
        Obj.img = "font-fight";
        // On alerte la vue que le templatre est chargé.
        Obj.notify('templateGame');
    }.bind(Obj));  
};

Game.prototype.getMessage = function(){
   return this.message; 
};

Game.prototype.getImg = function(){
   return this.img; 
};

Game.prototype.getView = function(){
   return this.view; 
};

// Cetter fonction permet de créer un joueur.
Game.prototype.addCharacter = function(json){
    if(typeof json.user !== "undefined" && typeof json.mdp !== "undefined" && json.user !== "" && json.mdp !== ""){
        // On récupère le joueure associé.
    }
    else if (typeof json.idMonster !== "undefined"){
        // On récupère les states du monstre associé.
    }
    else {
        // Une erreur est survenu
//        console.log("Impossible de créer un character. Aucune information valide n'a été passées en paramètre.");
        return this.notify("initCharacter");
    }
};

//Game.prototype.initCharacter1 = function(){
//    return this.notify("initCharacter");
//};