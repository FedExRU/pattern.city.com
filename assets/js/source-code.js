$(document).ready(function(){

	showCode();

	$('#source-code').click(function(){
		$('.data-content').hide();
		$('.source').show();
		$('.remodal').addClass('code-width');
		hideSourceCodeButton();
		showBackToAppButton();
	});

	$('#back-to-app').click(function(){
		hideBackToAppButton();
		showDataContent();
		showSourceCodeButton();
	});

	$('#source-options span').click(function(){
		$('article.code').hide();
		$('#source-options span').css('background', 'none');
		var option =  $(this),
			dataSource = option.attr('data-source');
		option.css('background', '#eee');
		showCode(dataSource);
	});

});

function showCode(attribute = 'app'){
	$('article[data-source="'+attribute+'"]').show();
}

function loadCode(){
	var actionSource = $('#actionSource').val();

	$('article[data-source="app"]').load('demo/codeCreator.php?source=app&actionSource='+actionSource);
	$('article[data-source="pattern"]').load('demo/codeCreator.php?pattern=app&actionSource='+actionSource);

}

function presentSourceCode(action, patternName){
	$('#actionSource').val(action);
	$('span[data-source="pattern"]').text(patternName+'.php');
	showSourceCodeButton();
}