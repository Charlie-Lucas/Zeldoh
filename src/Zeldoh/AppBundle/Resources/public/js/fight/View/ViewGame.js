function ViewGame(Game){
    this.Game = Game;
    this.observers = [];
    this.self = this;
    this.view = "";
}

ViewGame.prototype.attach = function(observer){
    this.observers.push(observer);
};

ViewGame.prototype.notify = function(action, action2, data){
    for (var key in this.observers)
    {
        var observable = this.observers[key];
        observable.update(action, action2, data);
    }
};

ViewGame.prototype.update = function(action){
    this.self[action]();
};

// Cette fonction est appelé lorsque le template de la zone de combat par défault est chargée.
ViewGame.prototype.templateGame = function(){
    this.view = this.Game.getView();
    $("#content").append(this.view);
    // On affiche le template
    this.display();
    // On charge les joueurs.
    this.notify("ControllerGame", "loadCharacter");
};

// Permet de changer le message de la zone de combat
ViewGame.prototype.changeMessage = function(msg){
    this.view.find(".title-fight").text(msg);
};

// Permet de changer le font du jeu
ViewGame.prototype.changeImg = function(classe){
    this.view.addClass(classe);
};

ViewGame.prototype.display = function(){
  this.changeMessage(this.Game.getMessage());
  this.changeImg(this.Game.getImg());
};

// Permet d'afficher l'interface du jeu
ViewGame.prototype.start = function(){
    var Obj = this;
    // On lance le jeux
    this.notify("ControllerGame", "start");
};
