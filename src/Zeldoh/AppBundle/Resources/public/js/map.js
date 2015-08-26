function showZone(coord) {

	var xy = coord.split(":");

	var x = parseInt(xy[0]);
	var y = parseInt(xy[1]);

	var nbLine = $('li.areaLine').length;
	var nbCol = $('ul.areas li.area').length/nbLine;

	var idxCol = Math.round(y/16);
	if (idxCol <= 0) {
		idxCol++;
	}
	else if (idxCol > nbCol) {
		idxCol--;
	}

	var idxLine = Math.round(x/16);
	if (idxLine <= 0) {
		idxLine++;
	}
	else if (idxLine > nbLine) {
		idxLine--;
	}

	$('li.areaLine:nth-child('+idxLine+')').find('ul.areas li.area:nth-child('+idxCol+')').addClass('showZone');
}