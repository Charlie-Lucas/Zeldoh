function showZone(coord) {

	var xy = coord.split(":");

	var x = parseInt(xy[0]);
	var y = parseInt(xy[1]);

	var idxCol = Math.round(y/16);
	var idxLine = Math.round(x/16);

	$('li.areaLine:nth-child('+idxLine+')').find('ul.areas li.area:nth-child('+idxCol+')').addClass('showZone');
}