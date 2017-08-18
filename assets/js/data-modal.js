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
			case 'building':
				loadBuildingHtml();
				break;

		}
	})

})

function callBuilding(){
	var structureForm = $('.structure.structure-active form');
	
	validateForm(structureForm, 'structure');

	var structureData = structureForm.serialize();

	 $.ajax({
		type: "POST",
		url: "functions/app.php",
		data: {action: "building",  structureData},
		success: function(data){
			var orderBuildingData = $.parseJSON(data);
			loadBuildingAnimation(orderBuildingData);
		}
	});
}

function callChiefDoctor(){
	var personalData = {
		'position' : 'Chief Doctor',
		'firstName' : 'Gilbert',
		'lastName' : 'Myers',
		'hireDate' : '12.02.2003'
	};
	$.ajax({
		type: "POST",
		url: "functions/app.php",
		data: {action: 'government', personalData},
		success: function(data){
			loadGovernmentHtml(data);
		}
	});
}

function callCityJudge(){
	var personalData = {
		'position' : 'City Judge',
		'firstName' : 'Margaret',
		'lastName' : 'Thompson',
		'hireDate' : '01.07.2008'
	};
	$.ajax({
		type: "POST",
		url: "functions/app.php",
		data: {action: 'government', personalData},
		success: function(data){
			loadGovernmentHtml(data);
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

function callPoliceCaptain(){
	var personalData = {
		'position' : 'Police Captain',
		'firstName' : 'Patrick',
		'lastName' : 'Cooper',
		'hireDate' : '03.10.2006'
	};
	$.ajax({
		type: "POST",
		url: "functions/app.php",
		data: {action: 'government', personalData},
		success: function(data){
			loadGovernmentHtml(data);
		}
	});
}

function loadBuildingAnimation(sampleData){
	$(".data-content").load('layouts/building/buildingAnimation.html', function(){
		$(this).find("#animation-content").css("background", "url("+sampleData.image+")");
		$(this).find("#construction-order h2").text(sampleData.orderRoof);
	});
}

function loadBuildingHtml(){
	$(".data-content").load('layouts/building/building.html');
}

function loadBuildingSettingsHtml(){
	$(".data-content").load('layouts/building/buildingSettings.html', function(){
		checkStructure();
	});
}

function loadGovernmentHtml(sampleData){
	var governmentData 	= $.parseJSON(sampleData);
	var governmentName 	= governmentData.governmentName;
	var governmentImage = governmentData.governmentImage;
	var governmentText 	= governmentData.governmentGreetings;
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



