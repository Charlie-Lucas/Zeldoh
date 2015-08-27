function ControllerItem()
{
      this.observers = [];
      this.view = "";

	this.update = function(action, data)
	{
            console.log(action);
            switch (action)
            {
                case "displayWeapons" :
                    var Obj = this;
                    // On parcourt la liste des weapons
                    $.each(data, function(i,v){
                        // On ajoute le template à notre
                        Obj.getTemplate(v);
                        // On demande au modèle de dire à la vu d'ajouter le template au DOM
                        console.log(v);
                        v.addWeapons();
                    }.bind(Obj));
                break;
                
                case "getTemplate" :
                    this.loadTemplate();
                break;
                
                case "saveTemplate" : 
                    this.saveTemplate(data);
                break;
                
                default :
                    data[action]();
                break;
                
            }
	};
           
}

// Permet de rattacher le controller principale
ControllerItem.prototype.attach = function(observer){
    this.observers.push(observer);
};

// Permet de notifier le controller principale
ControllerItem.prototype.notify = function(action, action2, data){
    for (var key in this.observers)
    {
        var observable = this.observers[key];
        observable.update(action, action2, data);
    }
};

ControllerItem.prototype.getTemplate = function(item){
    console.log("here");
    // Si le template n'a pas déjà été chargé
    item.setProperties("view", this.view.clone());
};

ControllerItem.prototype.saveTemplate = function(template){
    this.view = template;
};

ControllerItem.prototype.loadTemplate = function(){
    var template = "";
    var Obj = this;
    $.get( "./templates/item.html", function( data ) {
      template = $(data);
      // Quand la page html est récupéré on ajoute les events.
    }).always(function() {
        Obj.view = template.clone();
        // On alerte la vue que le templatre est chargé.
        Obj.notify('templateItem');
    }.bind(Obj));
};