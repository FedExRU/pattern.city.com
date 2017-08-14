$(document).ready(function(){

	$(".pattern").click(function(){

		var layoutValue = $(this).attr("data-modal");

		switch(layoutValue) {
			case 'mayor':
				loadSecretatyHtml();
				break;
		}
	})

})

function loadSecretatyHtml(){
	$(".data-content").load('../../layouts/mayor/secretary.html');
}

function loadMayorHtml(sampleData){
	var mayorData = $.parseJSON(sampleData);
	var mayorName = mayorData.mayorName;
	var mayorText = mayorData.mayorGreetings;
	$(".data-content").load('../../layouts/mayor/mayor.html', function(){
		var dialogWindow = $(this).find("#mayor-meeting #conversation p");
		dialogWindow.html("<strong>"+mayorName+":</strong> "+mayorText);
	});
	
}

function callMayor(){
	$.ajax({
		type: "POST",
		url: "../../functions/app.php",
		data: {action: 'mayor'},
		success: function(data){
			loadMayorHtml(data);
		}
	})
}

