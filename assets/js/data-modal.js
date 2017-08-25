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
			case 'emergency':
				loadEmergencyOperatorHtml();
				break;
			case 'celebration':
				loadCelebrationAnimatorHtml();
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
			loadBuildingAnimation(data);
		},
		error: function(){
			alert("Something went wrong! Try again later");
		}
	});
}

function callEmergency(cause){
	$.ajax({
		type: "POST",
		url: "functions/app.php",
		data: {action: "emergency", cause},
		success: function(data){
			loadEmergencyHtml(data);
		},
		error: function(){
			alert("Something went wrong! Try again later");	
		}
	});
}

function callGovernment(position){

	var personalData = {};

	switch(position){
		case 'chiefDoctor':
			personalData = {
				'position' : 'Chief Doctor',
				'firstName' : 'Gilbert',
				'lastName' : 'Myers',
				'hireDate' : '12.02.2003'
			};
			break;
		case 'cityJudge':
			personalData = {
				'position' : 'City Judge',
				'firstName' : 'Margaret',
				'lastName' : 'Thompson',
				'hireDate' : '01.07.2008'
			};
			break;
		case 'policeCaptain':
			personalData = {
				'position' : 'Police Captain',
				'firstName' : 'Patrick',
				'lastName' : 'Cooper',
				'hireDate' : '03.10.2006'
			};
			break;
	}

	$.ajax({
		type: "POST",
		url: "functions/app.php",
		data: {action: 'government', personalData},
		success: function(data){
			loadGovernmentHtml(data);
		},
		error: function(){
			alert("Something went wrong! Try again later");
		}
	});
}

function callMassMedia(){

	var partyField= $("#partyName");

	validateField(partyField);

	var partyName = partyField.val();

	$.ajax({
		type: "POST",
		url: "functions/app.php",
		data: {action: "massMedia", partyName},
		success: function(data){
			loadMassMediaHtml(data);
		},
		error: function(){
			alert("Something went wrong! Try again later");
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
		},
		error: function(){
			alert("Something went wrong! Try again later");
		}
	})
}

function loadBuildingAnimation(sampleData){
	var orderBuildingData = $.parseJSON(sampleData);
	$(".data-content").load('layouts/building/buildingAnimation.html', function(){
		$(this).find("#animation-content").css("background", "url("+orderBuildingData.animation+")");
		$(this).find("#construction-report #completed-structure").attr("src", "assets/img/building/"+orderBuildingData.completeStructureImage);
		$(this).find("#construction-report h2#roof-report-text").text(orderBuildingData.reportRoof);
		$(this).find("#construction-report h2#walls-report-text").text(orderBuildingData.reportWalls);
		$(this).find("#construction-report h2#windows-report-text").text(orderBuildingData.reportWindows);
		$(this).find("#construction-report h2#doors-report-text").text(orderBuildingData.reportDoors);
		$(this).find("#construction-report #report-titleing h2 span#structure-name").text(orderBuildingData.structureType);
		$(this).find("#construction-report #report-titleing h2 span#structure-date").text(orderBuildingData.date);
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

function loadCelebrationAnimatorHtml(){
	$(".data-content").load('layouts/massMedia/animator.html', function(){
		checkPartyName();
	});
}

function loadEmergencyHtml(sampleData){
	var emergencyData 	 = $.parseJSON(sampleData);
	var emergencyImage 	 = emergencyData.image;
	var emergencyMessage = emergencyData.message;

	$(".data-content").load('layouts/emergency/emergency.html', function(){
		$(this).find("#emergencyImage").attr("src", emergencyImage);
		$(this).find("#conversation p").text(emergencyMessage);
	});
}

function loadEmergencyOperatorHtml(){
	$(".data-content").load('layouts/emergency/emergencyOperator.html');
}

function loadGovernmentHtml(sampleData){
	var governmentData 	= $.parseJSON(sampleData);
	var governmentName 	= governmentData.governmentName;
	var governmentImage = governmentData.governmentImage;
	var governmentText 	= governmentData.governmentGreetings;
	$(".data-content").load('layouts/government/government.html', function(){
		var dialogWindow = $(this).find("#government-meeting #conversation p");
		var dialogImage  = $(this).find("#government-meeting img");
		dialogImage.attr("src", "assets/img/government/"+governmentImage);
		dialogWindow.html("<strong>"+governmentName+":</strong><span>"+governmentText+"</span>");
	});
}

function loadGovernmentSecretatyHtml(){
	$(".data-content").load('layouts/government/secretary.html');
}

function loadMassMediaHtml(sampleData){
	var massMediaData = $.parseJSON(sampleData);
	var tvData = massMediaData.tv;
	var siteData = massMediaData.site;

	$(".data-content").load('layouts/massMedia/massMedia.html', function(){
		$(this).find("#pc-24-image").attr("src", "assets/img/massMedia/" + tvData.image);
		$(this).find("#pc-24 span").text(tvData.text);
		$(this).find("#pcb-image").attr("src", "assets/img/massMedia/" + siteData.image);
		$(this).find("#pcb span").text(siteData.text);
	});
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




