var box  = document.getElementById('box');
var down = false;


function toggleNotifi(){
	if (down) {
		
		box.style.opacity = 0;
		down = false;
	}else {
		
		box.style.opacity = 1;
		down = true;
	}
}