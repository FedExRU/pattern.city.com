function checkStructure(){

	$(document).ready(function(){

		$('.structure').click(function(){
			var structure = $(this);

			if(structure.hasClass('structure-active')){
				structure.removeClass('structure-active');
				structure.removeClass('padding-bottom-55');
				$('.remodal-confirm').addClass('disabled');
				removeWarnings();
			}
			else{
				removeAllStructures();
				structure.addClass("structure-active");
			}

			if(structure.hasClass('structure-active')){
				$('.remodal-confirm').removeClass('disabled');
			}
		});

		$('.structure input').click(function(e){
			$(this).removeClass();
			$(this).next().remove();
			e.stopPropagation();
		})

	});

	function removeAllStructures(){
		$('.structure').each(function(){
			$(this).removeClass('structure-active');
			$(this).removeClass('padding-bottom-55');
			removeWarnings();
		});
	}

	function removeWarnings(){
		$('.structure input').each(function(){
				$(this).removeClass();
		});

		$('.structure .warning-text').each(function(){
			$(this).remove();
		})
	}
	
}

