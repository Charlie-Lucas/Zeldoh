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