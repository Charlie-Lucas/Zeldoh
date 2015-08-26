var Game = function(data){
    this.player = data.player;
    this.map = data.map;
    this.spawn= null;
    this.currentArea = null;
    var self = this;
    this.start = function(){
        this.setSpawn($('.spawn'));
    }
    this.setSpawn = function(spawn){
        this.spawn = spawn;
        this.showZone(spawn);
        console.log(spawn.data('x') + ':' + spawn.data('y'));
    }
    this.showZone = function(coordinate) {
        if(this.currentArea != null){
            this.currentArea.removeClass('showZone');
        }
        var area = coordinate.parents('.area');
        this.currentArea = area;
        area.addClass('showZone')
    }
}