function ControllerGame(Game, ViewGame)
{
      this.Characters = [];
      this.observers = [];
      this.views = [];
      this.game = Game;

	this.update = function(action, data)
	{
            switch (action)
            {
                case "start" :
                    this.game.start();
                    // On charge les templates secondaire
                    this.notify("ControllerItem", "getTemplate");
                break;
                
                case "loadCharacter" : 
                    // Création de l'héros 1
                    this.update("initCharacter");
                break;
                
                case "initCharacter" :
                    this.initCharacter();
                break;
                
                default :
                    data[action]();
                break;
                
            }
	};
           
}

// Permet de rattacher le controller principale
ControllerGame.prototype.attach = function(observer){
    this.observers.push(observer);
};

// Permet de notifier le controller principale
ControllerGame.prototype.notify = function(action, action2, data){
    for (var key in this.observers)
    {
        var observable = this.observers[key];
        observable.update(action, action2, data);
    }
};

// Cette fonction permet d'ajouter les personnages au combat du jeux.
ControllerGame.prototype.startGame = function(){
     this.Character.push(this.game.addCharacter());
};

ControllerGame.prototype.initCharacter = function(){
    var character = new Character();
    var viewCharacter = new ViewCharacter(character);
    viewCharacter.attach(this.observers[0]);
    character.attach(viewCharacter);
    character.initCharacter({
        name : "Erwan",
        health : {now : 50, max : 50},
        exp : {now : 2750, max : 4000},
        weapons : [{
                type : "epee",
                action : [
                    {
                        effect : "-10",
                        element : "health",
                        character : 2,
                        numberTurn : 0
                    }
                ]
        }, {
                type : "armour",
                action : [
                    {
                        effect : "+10",
                        element : "Armour",
                        character : 1,
                        numberTurn : 0
                    }
                ]
        }],
        level : 1,
        strength : 40,
        agility : 20,
        armor : 30,
        img : "link",
        type : "link"
    });
    character.display();
    this.Characters.push(character);
    this.views.push(viewCharacter);
};