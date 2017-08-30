/*[--------------------------------------------------------------------------------------
 * 0. Document
 *---------------------------------------------------------------------------------------]
 */

$(document).ready(function(){
	presentScrollUp();

	$('#up').click(function(){
		$("body, html").animate({
			scrollTop: 0}, 1000);
	});

	$('.remodal-wrapper').click(function(){
		if(!$(this).hasClass('remodal-is-opened')){
			hideBackToAppButton();
			hideSourceCodeButton();
			showDataContent();
		}
	});

})

$(window).scroll(function(){
	presentScrollUp();
});

function breakAnimation(time, fadeIn = false){
	$(document).ready(function(){
		if(fadeIn)
			$('.fade-in-animation').css("opacity", '1');
		setTimeout(function() {
			$('.animation-content').remove();
			$('.after-animation').fadeIn(400);
		}, time);
	});
}

function hideBackToAppButton(){
	$('#back-to-app').hide();
}

function hideSourceCodeButton(){
	$('#source-code').hide();
}

function presentScrollUp(){
	if($(window).scrollTop() > 200)
		$('#up').fadeIn(500);
	else
		$('#up').fadeOut(500);
}

function showBackToAppButton(){
	$('#back-to-app').show();
}

function showDataContent(){
	$('.source').hide();
	$('.data-content').show();
	$('.remodal').removeClass('code-width');
}

function showSourceCodeButton(){
	$('#source-code').show();
	loadCode();
}

/*[--------------------------------------------------------------------------------------
 * 1. Mass media
 *---------------------------------------------------------------------------------------]
 */

function checkPartyName(){
	$(document).ready(function(){

		$('#partyName').focus(function(){
			$(this).css('border', 'none');
		})

	});
}

/*[--------------------------------------------------------------------------------------
 * 2. Structure
 *---------------------------------------------------------------------------------------]
 */

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
				structure.addClass('structure-active');
			}

			if(structure.hasClass('structure-active')){
				$('.remodal-confirm').removeClass('disabled');
			}
		});

		$('.structure input').click(function(e){
			$(this).removeClass();
			$(this).nextAll().remove();
			e.stopPropagation();
		})

		$('.structure input').focus(function(e){
			$(this).removeClass();
			$(this).nextAll().remove();
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

/*[--------------------------------------------------------------------------------------
 * 3. Researching
 *---------------------------------------------------------------------------------------]
 */

 function checkResearching(){

 	$(document).ready(function(){
 		$('.direction').click(function(){
 			if($(this).hasClass('direction-active')){
 				$(this).removeClass('direction-active');
 				$('#research-choose-actions .remodal-confirm').addClass('disabled');
 			}else{
 				$('.direction').each(function(){
 					$(this).removeClass('direction-active');
 				});
 				$(this).addClass('direction-active');
 				$('#research-choose-actions .remodal-confirm').removeClass('disabled');
 			}
 		});
 	});
 }