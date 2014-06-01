function resize(id) {
		var element = document.getElementById(id);
		var el2 = document.getElementById(id).style.className = '.content {background-color:red;}';
		element.style.cssText = " position:absolute; z-index:200; width:50%;  left:25%;	top:50%;bottom:50%; background-repeat: no-repeat;";

}

function resizeBack(id) {
		var element = document.getElementById(id);
		element.style.cssText = "width: 30%; height: auto;margin: 3% 0;";

} 