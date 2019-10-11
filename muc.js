	function muncul() {
		document.getElementById('gaksida').style.display= "inline";
		document.getElementById('gaksida').style.position= "relative";
		document.getElementById('golek').style.display= "none";
		document.getElementById('golek').style.position= "absolute";
		document.getElementById('txtgolek').style.display= "inline";
		document.getElementById('txtgolek').style.position= "relative";
		document.getElementById('tg').style.margin= "0 0 0 0";
	}
	function gaksida() {
		document.getElementById('gaksida').style.display= "none";
		document.getElementById('gaksida').style.position= "absolute";
		document.getElementById('golek').style.display= "inline";
		document.getElementById('golek').style.position= "relative";
		document.getElementById('txtgolek').style.display= "none";
		document.getElementById('txtgolek').style.position= "absolute";
		document.getElementById('tg').style.margin= "0 0 6 0";
	}
	function njedul() {
		document.getElementById('njobo').style.display= "block";
	}
	function metu() {
		document.getElementById('njobo').style.display="none";
		document.getElementById('njobo2').style.display="none";
		document.getElementById('njobo3').style.display="none";
	}