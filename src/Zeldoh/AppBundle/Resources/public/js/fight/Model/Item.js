function Item(){
    this.type = "";
    this.view = "";
    this.observers = [];
    this.action = {};
}

Item.prototype.notify = function(action) {
    for(var key in this.observers){
        var observable  = this.observers[key];
        observable.update(action);
    }
};

Item.prototype.attach = function(observer){
    this.observers.push(observer);
};

Item.prototype.initCharacter = function(json){
    var Obj = this;
    $.each(json, function(i,v){
        Obj[i] = v;
    }.bind(Obj));
};

Item.prototype.addWeapons = function(){
    // On affiche la vue
    this.notify("displayWeapons");
};

// Permet de récupérer la propriété passée en paramètre
Item.prototype.getProperties = function(name){
    if(typeof this[name] !== "undefined"){
        return this[name];
    }
};

// Permet de modifier la propriété passée en paramètre avec la valeur spécfié
Item.prototype.setProperties = function(name, value){
    if(typeof this[name] !== "undefined"){
        this[name] = value;
        return value;
    }
};

