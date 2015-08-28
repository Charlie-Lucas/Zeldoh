function Character(){
    this.name = "";    // Nom de joueur
    this.level = 1;    // Niveau du joueur
    this.strength = 0;  // Force
    this.exp = 0;       // Expérience
    this.agility = 0;   // Agilité
    this.health = 0;     // Vie
    this.items = [];     // Liste des items du joueurs
    this.itemUse = [];   // Item en cours d'utilisation
    this.weapons = [];   // Arme du perso
    this.armor = 0;     // Armur du joueure
    this.img = "";      // Image du joueur
    this.view = "";   
    this.type = "";
    this.observers = [];
}

Character.prototype.notify = function(action) {
    for(var key in this.observers){
        var observable  = this.observers[key];
        return observable.update(action);
    }
};

Character.prototype.attach = function(observer){
    this.observers.push(observer);
};

Character.prototype.initCharacter = function(json){
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

// Permet de récupérer la propriété passée en paramètre
Character.prototype.getProperties = function(name){
    if(typeof this[name] !== "undefined"){
        return this[name];
    }
};

// Permet de modifier la propriété passée en paramètre avec la valeur spécfié
Character.prototype.setProperties = function(name, value){
    if(typeof this[name] !== "undefined"){
        this[name] = value;
        return value;
    }
};

Character.prototype.display = function(){
    var template = "";
    var Obj = this;
    $.get( "./templates/character.html", function( data ) {
      template = $(data);
      // Quand la page html est récupéré on ajoute les events.
    }).always(function() {
        Obj.view = template.clone();
        // On alerte la vue que le template est chargé.
        Obj.notify('templateCharacter');
    }.bind(Obj));
};

Character.prototype.addItem = function(array, controller){
    var tab = [];
    $.each(array, function(i, v){
        console.log(controller);
        var item = new Item();
        var viewItem = new ViewItem(item);
        viewItem.attach(controller);
        item.attach(viewItem);
        item.initCharacter(v);
        tab.push(item);
    });
    return tab;
};

//dans character une function UseItem ? 