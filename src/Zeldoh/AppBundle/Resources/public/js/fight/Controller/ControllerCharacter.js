function ControllerCharacter()
{
      this.view = "";
      this.observers = [];
       
	this.update = function(action, data)
	{
            switch (action)
            {
                
                default :
                    data[action]();
                break;
                
            }
	};
           
}

// Permet de rattacher le controller principal
ControllerCharacter.prototype.attach = function(observer){
    this.observers.push(observer);
};

// Permet de notifier le controller principal
ControllerCharacter.prototype.notify = function(action, action2, data){
    for (var key in this.observers)
    {
        var observable = this.observers[key];
        observable.update(action, action2, data);
    }
};