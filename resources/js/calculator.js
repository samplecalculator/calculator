
function getInput(inputValue){
	if(inputValue === 'clean'){
		document.getElementById('screen').value = '';
	}else{
		document.getElementById('screen').value += inputValue;
	}
}
function processInput(equation){
	var response = eval(equation);
	document.getElementById('screen').value = response;
}
function enter(input, e){
	var code;
	if(e && e.which){
		code = e.which;
	}else if(window.event){
		e = window.event;
		code = e.keyCode;
	}	
	if(code == 13){
		processInput(document.getElementById('screen').value);
	}
}
