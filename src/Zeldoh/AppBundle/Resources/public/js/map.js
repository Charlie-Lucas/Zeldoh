function showZone(coord) {

	var xy = coord.split(":");

	var x = parseInt(coord[0]);
	var y = parseInt(coord[1]);

	var idxCol = Math.round(x/16);
	var idxLine = Math.round(y/16);

	$('li.areaLine:nth-child('+idxLine+')').find('ul.areas li.area:nth-child('+idxCol+')').addClass('showZone');
}