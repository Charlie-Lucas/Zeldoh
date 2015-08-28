function Monster(){
    this.name = "";    // Nom de joueur
    this.level = 1;    // Niveau du joueur
    this.strength = 0;  // Force
    this.exp = 0;       // Expérience
    this.agility = 0;   // Agilité
    this.health = 0;     // Vie
    this.weapons = [];   // Arme du perso
    this.armor = 0;     // Armur du joueure
    this.img = "";      // Image du joueur
    this.view = "";   
    this.type = "";
    this.observers = [];
}

Monster.prototype.notify = function(action) {
    for(var key in this.observers){
        var observable  = this.observers[key];
        observable.update(action);
    }
};

Monster.prototype.attach = function(observer){
    this.observers.push(observer);
};

Monster.prototype.initMonster = function(json){
    var Obj = this;
    var controller = this.notify("getController");
    console.log(controller);
    $.each(json, function(i,v){
        if(i === "item"){
            Obj.items = this.addItem(v,controller);
        }
        else if (i === "weapons"){
             Obj.weapons = this.addItem(v, controller);
        }
        else {
            Obj[i] = v;
        }
    }.bind(Obj));  
};

Monster.prototype.getProperties = function(name){
    if(typeof this[name] !== "undefined"){
        return this[name];
    }
};

Monster.prototype.display = function(){
    var template = "";
    var Obj = this;
    $.get( "./templates/monster.html", function( data ) {
      template = $(data);
      // Quand la page html est récupéré on ajoute les events.
    }).always(function() {
        Obj.view = template.clone();
        // On alerte la vue que le template est chargé.
        Obj.notify('templateMonster');
    }.bind(Obj));
};