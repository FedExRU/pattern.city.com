function addWarnings(selector, text){
	selector.addClass('warning'); 
	selector.after(' <p class = "warning-text"> '+text+' </p> ');
}

function validateField(sampleField){
	if(sampleField.val() == ''){
		sampleField.css("border", "1px solid #e57373");
		throw new Error("The field was not inserted!");
	}
}

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

function validateParam(sampleParam){
	if(sampleParam == null){
		alert("Unexpected error: some parameter was not selected!");
		throw new Error("Some parameter was not selected!");
	}
}

function validateStructureForm(sampleForm){
	var controlValidators = 0;

	sampleForm.find('input').each(function(){
		$(this).nextAll("p").remove();
		if($(this).val().length === 0) {
			if( !($(this).next().hasClass('warning-text'))){
				addWarnings($(this), 'Required field is empty!');
				$('.structure.structure-active').addClass('padding-bottom-55');
			}
		}

		if($(this).attr("type") == "number"){
			var minValue  = parseInt($(this).attr("min"));
			var currValue = parseInt($(this).val());
			if(minValue > currValue){
				addWarnings($(this), 'Required field is less than '+minValue+'!');
				$('.structure.structure-active').addClass('padding-bottom-55');
			}
		}

		if(!$(this).hasClass("warning")){
			controlValidators++;
		 	$(this).addClass('acception');
		 	$(this).nextAll("p").remove();
		}
	});

	if(controlValidators !== sampleForm.find('input').length)
		throw new Error("Some fields was not inserted!");
}
