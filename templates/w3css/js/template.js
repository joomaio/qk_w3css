function openRightMenu() {
	document.getElementById("rightMenu").style.display = "block";
}
  
function closeRightMenu() {
	document.getElementById("rightMenu").style.display = "none";
}

function addCategories(id) {
	var x = document.getElementById(id);
	if (x.className.indexOf("w3-show") == -1) {
	  x.className += " w3-show";
	} else { 
	  x.className = x.className.replace(" w3-show", "");
	}
}

function openTabSubmit(evt, tab) {
	var i, x, tablinks;
	x = document.getElementsByClassName("tab-pane");
	for (i = 0; i < x.length; i++) {
	  x[i].style.display = "none";
	}
	tablinks = document.getElementsByClassName("tablink");
	for (i = 0; i < x.length; i++) {
	  tablinks[i].className = tablinks[i].className.replace(" active", "");
	}
	document.getElementById(tab).style.display = "block";
	evt.currentTarget.className += " active";
}

function closeAlert() {
	document.getElementById("system-message").style.display = "none";
}
  
