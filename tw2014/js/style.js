function resize(id) {
		var element = document.getElementById(id);
		element.style.visibility = 'visible';
		element.style.width = "100%";
		element.style.height = "100%";
		element.style.cursor = "pointer";
		
		
}

function resizeBack(id) {
		var element = document.getElementById(id);
		element.style.width = "";
		element.style.height = "";
		element.style.cursor = "pointer";
		element.style.visibility = 'visible';
} 