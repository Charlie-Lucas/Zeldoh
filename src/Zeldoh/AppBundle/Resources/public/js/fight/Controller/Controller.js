function Controller(ControllerGame, ControllerCharacter, ControllerMonster, ControllerItem)
{
      this.views = [];   // Contient les vues de chaque character
      this.Character = [];
      this.controllerGame = ControllerGame;
      this.controllerCharacter = ControllerCharacter;
      this.controllerMonster = ControllerMonster;
      this.controllerItem = ControllerItem;
      
	this.update = function(controller, action2, data)
	{
            switch (controller)
            {
                
                ////////////////   Routage    ///////////////////
                
                
                case "ControllerGame" :
                    ControllerGame.update(action2, data);
                break;
                
                case "ControllerCharacter" : 
                    ControllerCharacter.update(action2, data);
                break;
                
                case "ControllerMonster" : 
                    ControllerMonster.update(action2, data);
                break;
                
                case "ControllerItem" : 
                    ControllerItem.update(action2, data);
                break;
                
                /////////////////   Action  ///////////////////////
                
                
                
            }
	};
        
        
}

