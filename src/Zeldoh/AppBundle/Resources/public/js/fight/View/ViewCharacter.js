function ViewCharacter(Character){
    this.Character = Character;
    this.observers = [];
    this.self = this;
    this.view = "";
}

ViewCharacter.prototype.attach = function(observer){
    this.observers.push(observer);
};

ViewCharacter.prototype.notify = function(action, action2, data){
    for (var key in this.observers)
    {
        var observable = this.observers[key];
        observable.update(action, action2, data);
    }
};

ViewCharacter.prototype.update = function(action){
    return this.self[action]();
};

ViewCharacter.prototype.templateCharacter = function(){
    this.view = this.Character.getProperties("view");
    // Photos du perso
    this.view.find("#character_infos").addClass("logo-"+this.Character.getProperties("img"));
    // Level du perso
    this.view.find("#level_character").text(this.Character.getProperties("level"));
    // Infos du perso :
    this.changeHealth();
    this.changeExp();
    $("#character1").append(this.view);
    // Action sur bouton items
    this.eventMenu();
};

// Cette fonction permet de calculer le poucentage de la bar censé être remplit.
ViewCharacter.prototype.calculatePourcentBar = function(properties){
    var properties = this.Character.getProperties(properties);
    var pourcent = Math.round(( parseInt(properties.now) / parseInt(properties.max) ) * 100) ;
    // 1 % = 1.3 px
    return (pourcent > 100) ? 100+"%" : pourcent+"%" ;
};

ViewCharacter.prototype.changeHealth = function(){
    // Sante du perso
    this.view.find("#health_character").text(this.Character.getProperties("health").now+" / "+this.Character.getProperties("health").max);
    // Bar de vie
    this.view.find("#bar_health").children().css("width", this.calculatePourcentBar("health"));
};

ViewCharacter.prototype.changeExp = function(){
    // Exp du perso
    this.view.find("#exp_character").text(this.Character.getProperties("exp").now+" / "+this.Character.getProperties("exp").max);
    // Bar d'expérience
    this.view.find("#bar_exp").children().css("width", this.calculatePourcentBar("exp"));
};

// Déclanchement des évènements 
ViewCharacter.prototype.eventMenu = function(){
    var Obj = this;
    this.view.find(".btn_menu_character").click(function(e){
        // On autorise l'action si c'est au tour du joueur de jouer.
        if($(e.currentTarget).parent().hasClass("ready-fight")){
            var nameItem = "event"+$(e.currentTarget).attr("id");
            Obj[nameItem]();
        } else {
            console.log("Ce n'est pas à vous de jouer.");
        }
    }.bind(Obj));
};

// Event des attaques.
ViewCharacter.prototype.eventweapon = function(){
  var Obj = this;
  var element = $("#weapon");
  var contentItem = $("#character_menu2");
  // On vide la liste des items
  this.cleanMenu2();
  var weapons = this.Character.getProperties("weapons");
  this.notify("ControllerItem", "displayWeapons", weapons);
  $("#character_menu2").addClass("open");
};

// Permet de vider la liste des items.
ViewCharacter.prototype.cleanMenu2 = function(){
    var contentItem = $("#character_menu2");
    contentItem.toggleClass("open","close");
    contentItem.empty();
};

ViewCharacter.prototype.calculateItem = function(json){
    $.each(json, function(i,v){
        switch(v){
            
        }
    });
};

ViewCharacter.prototype.getController = function(){
  return this.observers[0];  
};