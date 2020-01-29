document.getElementById("mm").onclick = function(){
	var mi = document.getElementsByClassName("menu")[0];
	if(mi.style.display == 'block')
		mi.style.display = 'none';
	else
		mi.style.display = 'block';
};

document.body.onresize = function(){
    var w = window.outerWidth;
    var mi = document.getElementsByClassName("menu")[0];
    if (w >= 1000){
		mi.style.display = 'block';
    } else{
		mi.style.display = 'none';    	
    }
};