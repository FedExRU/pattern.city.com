function validateForm(sampleForm, type){

	if(sampleForm.length === 0){
		var message = type + " was not selected!";
		alert("Unexpected error: "+message);
		throw new Error(message);
	}

	switch (type) {
		case 'structure':
			validateStructureForm(sampleForm);
			break;
	}
}

function validateStructureForm(sampleForm){
	var controlValidators = 0;
	sampleForm.find('input').each(function(){
		if($(this).val().length === 0) {
			if( !($(this).next().hasClass('warning-text'))){
				$(this).addClass('warning'); 
				$(this).after(' <p class = "warning-text"> Required field is empty ! </p> ');
				$('.structure.structure-active').addClass('padding-bottom-55');
			}
		} else{
			controlValidators++;
		 	$(this).addClass('acception');
		}
	});

	if(controlValidators !== sampleForm.find('input').length)
		throw new Error("Some fields was not inserted!");


}