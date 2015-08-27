$(document).ready(function(){
  var game = new Game();
  var viewGame = new ViewGame(game);
  var controllerGame = new ControllerGame(game, viewGame);
  var controllerCharacter = new ControllerCharacter();
  var controllerMonster = new ControllerMonster();
  var controllerItem = new ControllerItem();
  var controller = new Controller(controllerGame, controllerCharacter, controllerMonster, controllerItem);
  controllerGame.attach(controller);
  controllerCharacter.attach(controller);
  controllerMonster.attach(controller);
  controllerItem.attach(controller);
  game.attach(viewGame);
  viewGame.attach(controller);
  viewGame.start();
});


