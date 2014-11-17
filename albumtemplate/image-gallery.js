
function addEventListeners() {

	// add listeners to the images so they can be click focused
	var images = document.getElementsByTagName("figure");
	var i = images.length;
	while (i--) {
		images[i].addEventListener('click', focusImage, true);
	}
	
	//hack until i work out how to get the children to react
	var images = document.getElementsByTagName("img");
	i = images.length;
	while (i--) {
		images[i].addEventListener('click', focusImage, false);
	}
}

function focusImage(e) {
	
	var el = e.target;
	
	//very basic. Doesn't work if there is a class name, but we don't have to deal with that in this showcase.
	var images = document.getElementsByTagName("figure");
	var i = images.length;
	while (i--) {
		images[i].className = "";
		//images[i].className = images.className.replace(reg,' ');
	}
	
	if (el.tagName == "FIGURE") {
		el.className = 'active'; 
	} else {
		el.parentNode.className = 'active';
	}
}

window.addEventListener('load', addEventListeners, false);