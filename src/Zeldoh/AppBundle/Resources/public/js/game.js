var Game = function(data){
    this.player = new Player(data.player);
    this.map = data.map;
    this.spawn= null;
    var maxX = 0;
    var maxY = 0;
    this.currentArea = null;
    var self = this;
    this.start = function(){
        var spawn = $('.spawn');
        this.setSpawn(spawn);
        this.showCurrentZone(spawn);
        this.player.setPosition(spawn);
        this.player.setGame(this);
        this.generateMonsters();

        window.addEventListener('keydown', function(event){
            //if (event.defaultPrevented) {
            //    return; // Should do nothing if the key event was already consumed.
            //}
            switch (event.keyCode) {
                case 40:
                    self.player.moveDown();
                    break;

                case 38:
                    self.player.moveUp();
                    break;
                case 37:
                    self.player.moveLeft();

                    break;
                case 39:
                    self.player.moveRight();
                    break;
                default:
                    return;
            }


            event.preventDefault();
        })
    };
    this.setSpawn = function(spawn){
        this.spawn = spawn;
    };
    this.showCurrentZone = function(coordinate) {
        if(this.currentArea != null){
            this.currentArea.removeClass('showZone');
        }
        var area = coordinate.parents('.area');
        this.currentArea = area;
        area.addClass('showZone');

        var dataRow = area.attr('data-row');
        var dataColumn = area.attr('data-column');

        $('ul.miniMap li.minimap-area').removeClass('currentZone');
        $('ul.miniMap li.minimap-area_'+dataRow+'_'+dataColumn).addClass('currentZone');
        $('ul.miniMap li.minimap-area_'+dataRow+'_'+dataColumn).addClass('visited');
    }
    this.setMaxY = function(maxY)
    {
        this.maxY = maxY;
    }
    this.setMaxX = function (maxX) {
        this.maxX = maxX;
    }
    this.generateMonsters= function(){
        var area_lines = this.map.area_lines;
        for(var i = 0; i < area_lines.length; i++)
        {
            var area_line = area_lines[i];
            var areas = area_line.areas;
            for(var j = 0; j < areas.length ; j++)
            {
                var area = area_line.areas[j];
                var monsters = area.monsters;
                var areaElemId =  "area_" + j + '_' + i;
                var areaElem = $('#'+areaElemId);
                var lands = areaElem.find('.sp-monster:not(.spawn)');
                var landsNumber = lands.length;
                for(var k = 0 ; k < monsters.length; k++)
                {
                    var landIndex = Math.floor((Math.random() * landsNumber));
                    this.createMonsterForGround(monsters[k], lands[landIndex]);
                }
            }
        };
    }
    this.createMonsterForGround = function(monster, land){
        $(land).addClass('monster');
        $(land).append($('<img></img>'));
        $(land).find('img').attr('src', bundlesBaseDir + "zeldohapp/images/monster.png");
        $(land).find('img').attr('class', 'down');
    }
};
var Player = function(data){
    this.game = null;
    this.allowToMove= true;
    this.data = data;
    this.position = null;
    var self = this;
    this.setPosition = function (position, orientation){
        if (orientation == null) {
            orientation = 'down';
        }
        if(position.hasClass('walk') && this.allowToMove)
        {

            if(this.position != null)
            {
                if(position.parents('.area') != this.position.parents('.area')){
                    this.game.showCurrentZone(position);
                }
                this.position.removeClass('player');
                this.position.find('img').remove();

            }
            this.position = position;
            this.position.addClass('player');
            this.position.append('<img></img>');
            $('.player').find('img').attr('src', bundlesBaseDir + this.data.image);
            $('.player').find('img').attr('class', orientation);
            this.allowToMove = false;
            var timeOut = setTimeout(function(){
                self.allowToMove = true;

            }, 150);
        }
    }
    this.setGame = function(game){
        this.game = game;
    }
    this.moveDown = function(){
        if(this.position.data('x') + 1 <= this.game.maxX) {
            var newPositionId = "coordinate_" + (this.position.data('x') + 1) + '_' + this.position.data('y');
            this.setPosition($('#' + newPositionId), 'down');
        }
    }
    this.moveUp = function(){
        if(this.position.data('x') - 1 >= 0)
        {
            var newPositionId = "coordinate_" + (this.position.data('x') - 1) + '_'+ this.position.data('y');
            this.setPosition($('#' + newPositionId), 'up');
        }
    }
    this.moveLeft = function(){
        if(this.position.data('y') - 1 >= 0) {
            var newPositionId = "coordinate_" + this.position.data('x') + '_' + (this.position.data('y') - 1);
            this.setPosition($('#' + newPositionId), 'left');
        }
    }
    this.moveRight = function(){
        if(this.position.data('y') + 1 <= this.game.maxY) {
            var newPositionId = "coordinate_" + this.position.data('x') + '_' + (this.position.data('y') + 1);
            this.setPosition($('#' + newPositionId), 'right');
        }
    }
};