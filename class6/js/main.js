
function doColorSwap() {
	var el = document.getElementById('foo');
	alert(el.style.color);
	if (el.style.color == "purple") {
		el.style.color = "red";
	}
	else if (el.style.color == "red") {
		el.style.color = "purple";
	}
}

function doColorSwapWithJQuery() {
	var el = $('h1#foo');
	alert(el.css('color'))
	if (el.css('color') == 'rgb(128, 0, 128)') {
		el.css('color', 'rgb(255, 0, 0)');
	}
	else if (el.css('color') == 'rgb(255, 0, 0)') {
		el.css('color', 'rgb(128, 0, 128)');
	}
}







