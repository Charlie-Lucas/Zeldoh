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