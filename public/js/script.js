let pHeight = document.getElementById("page").style;
window.scrollTo(0,0);


setTimeout(function(){
	document.getElementById('rubriques').style.opacity = 1;
}, 2460);


function appear(x){
	if (x.children[2].style.display == "none") {
		x.children[2].style.display = "flex";
		x.removeAttribute('onclick');
		document.body.style.overflowY = "hidden";
		window.scrollTo({
			top: 0, behavior: "smooth"
		})
	} else{
		x.children[2].style.display = "none";
		document.body.style.overflowY = "scroll";
	}
	
}

function disappear(x){
	x.parentNode.removeAttribute('style');
	x.parentNode.parentNode.setAttribute('onclick', 'appear(this)');
}



let tabSeries = document.getElementsByClassName('LSeries');
let chrono = 0;

for (let i = 0; i < tabSeries.length; i++) {
	setTimeout(function(){
			tabSeries[i].style.animation = ".5s ease-out 0s 1 pageAppLeft";
			setTimeout(function(){
				tabSeries[i].style.opacity = 1;
			}, 1);
	}, chrono += 100);
}

$(document).ready(function() {
	$("#changesaison").change(function(e) {
		e.preventDefault()
		$(".unesaison").hide();

		$("#saison"+$("#changesaison").val()).show();
	})
})
