$(document).ready(function(){

	$(".pattern").click(function(){

		var layoutValue = $(this).attr("data-modal");

		switch(layoutValue) {
			case 'mayor':
				loadMayorSecretatyHtml();
				break;
			case 'government':
				loadGovernmentSecretatyHtml();
				break;
		}
	})

})

function callChiefDoctor(){
	var personalData = {
		'position' : 'Chief Doctor',
		'firstName' : 'Gilbert',
		'lastName' : 'Myers',
		'hireDate' : '12.17.2003'
	};
	$.ajax({
		type: "POST",
		url: "functions/app.php",
		data: {action: 'government', personalData},
		success: function(data){
			loadGovernmentHtml(data);
			console.log(data);
		}
	});
}

function callMayor(){
	$.ajax({
		type: "POST",
		url: "functions/app.php",
		data: {action: 'mayor'},
		success: function(data){
			loadMayorHtml(data);
		}
	})
}

function loadGovernmentHtml(sampleData){
	var governmentData = $.parseJSON(sampleData);
	var governmentName = governmentData.governmentName;
	var governmentImage = governmentData.governmentImage;
	var governmentText = governmentData.governmentGreetings;
	$(".data-content").load('layouts/government/government.html', function(){
		var dialogWindow = $(this).find("#government-meeting #conversation p");
		var dialogImage = $(this).find("#government-meeting img");
		dialogImage.attr("src", "assets/img/government/"+governmentImage);
		dialogWindow.html("<strong>"+governmentName+":</strong> "+governmentText);
	});
}

function loadGovernmentSecretatyHtml(){
	$(".data-content").load('layouts/government/secretary.html');
}

function loadMayorHtml(sampleData){
	var mayorData = $.parseJSON(sampleData);
	var mayorName = mayorData.mayorName;
	var mayorText = mayorData.mayorGreetings;
	$(".data-content").load('layouts/mayor/mayor.html', function(){
		var dialogWindow = $(this).find("#mayor-meeting #conversation p");
		dialogWindow.html("<strong>"+mayorName+":</strong> "+mayorText);
	});
	
}

function loadMayorSecretatyHtml(){
	$(".data-content").load('layouts/mayor/secretary.html');
}



