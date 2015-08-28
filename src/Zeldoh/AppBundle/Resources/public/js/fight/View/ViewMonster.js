function ViewMonster(Monster){
    this.Monster = Monster;
    this.observers = [];
    this.self = this;
    this.view = "";
}

ViewMonster.prototype.attach = function(observer){
    this.observers.push(observer);
};

ViewMonster.prototype.notify = function(action, action2, data){
    for (var key in this.observers)
    {
        var observable = this.observers[key];
        observable.update(action, action2, data);
    }
};

ViewMonster.prototype.update = function(action){
    this.self[action]();
};

ViewMonster.prototype.templateMonster = function(){
    this.view = this.Monster.getProperties("view");
    // Photos du perso
    this.view.find("#monster_infos").addClass("logo-"+this.Monster.getProperties("img"));
    // Level du perso
    this.view.find("#level_monster").text(this.Monster.getProperties("level"));
    // Infos du perso :
    this.changeHealth();
    this.changeExp();
    $("#character1").append(this.view);
    // Action sur bouton items
    this.eventMenu();
};

// Cette fonction permet de calculer le poucentage de la bar censé être remplit.
ViewMonster.prototype.calculatePourcentBar = function(properties){
    var properties = this.Monster.getProperties(properties);
    var pourcent = Math.round(( parseInt(properties.now) / parseInt(properties.max) ) * 100) ;
    // 1 % = 1.3 px
    return (pourcent > 100) ? 100+"%" : pourcent+"%" ;
};

ViewMonster.prototype.changeHealth = function(){
    // Sante du perso
    this.view.find("#health_monster").text(this.Monster.getProperties("health").now+" / "+this.Monster.getProperties("health").max);
    // Bar de vie
    this.view.find("#bar_health").children().css("width", this.calculatePourcentBar("health"));
};