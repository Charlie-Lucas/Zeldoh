function ViewItem(Item){
    this.Item = Item;
    this.observers = [];
    this.self = this;
    this.view = "";
}

ViewItem.prototype.attach = function(observer){
    this.observers.push(observer);
};

ViewItem.prototype.notify = function(action, action2, data){
    for (var key in this.observers)
    {
        var observable = this.observers[key];
        console.log("observable");
        console.log(observable);
        observable.update(action, action2, data);
    }
};

ViewItem.prototype.update = function(action){
    this.self[action]();
};

// On affiche les actions
ViewItem.prototype.displayWeapons = function(){
    this.view = this.Item.getProperties("view");
    this.view.addClass(this.Item.getProperties("type"));
    this.view.click(function(){
        // Instruction en cas d'attaque.
        console.log("click du weapons : "+this.Item.getProperties("type"));
    });
    $("#character_menu2").append(this.view);
};

ViewItem.prototype.templateItem = function(){
  this.view = this.Item.getProperties("view");
  this.notify("ControllerItem", "saveTemplate", this.view);
};