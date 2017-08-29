/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *
 *
 * Included files:
 * -----------------------------------------------------------
 *
 * 1] validation.js 	- this file validates forms and custom 
 * fields
 *
 * 2] customization.js 	- this file customizes fields and 
 * buttons during validation
 *
 * ---------------------------------------------------------
 *
 *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

var app = "functions/app.php";

 /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *
 *
 * 0] Switch cases for loading nessesarry basic layout from
 * index.html. Target variable - data-modal in div.pattern tag
 *
 *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */


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
			case 'science':
				loadMainScientistHtml();
				break;
			case 'celebration':
				loadCelebrationAnimatorHtml();
				break;
			case 'embassy':
				loadEmbassySecretaryHtml();
				break;
		}
	})
})

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *
 *
 * 1] AJAX-queries to Server (app.php). Prefix of functions 
 * - call
 *
 *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

function callAmbassador(countryAmbassador){
	$.ajax({
		type: "POST",
		url: app,
		data: {action: "embassy", countryAmbassador},
		success: function(data){
			loadAmbassadorHtml(data);
		},
		error: function(){
			alert("Something went wrong! Try again later");
		}
	});
}

function callBuilding(){
	var structureForm = $('.structure.structure-active form');
	
	validateForm(structureForm, 'structure');

	var structureData = structureForm.serialize();

	 $.ajax({
		type: "POST",
		url: app,
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
		url: app,
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
		case 'Minister Of Health':
			personalData = {
				'position' : 'Minister of Health',
				'firstName': 'Gilbert',
				'lastName' : 'Myers',
				'hireDate' : '12.02.2003',
				'image'    : 'ministerOfHealth.png'
			};
			break;
		case 'Chairman Of The City Parliament':
			personalData = {
				'position' : 'Chairman of the City Parliament',
				'firstName': 'Margaret',
				'lastName' : 'Thompson',
				'hireDate' : '01.07.2008',
				'image'    : 'chairmanOfTheCityParliament.png'
			};
			break;
		case 'Minister Of Defense':
			personalData = {
				'position' : 'Minister of Defense',
				'firstName': 'Patrick',
				'lastName' : 'Cooper',
				'hireDate' : '03.10.2006',
				'image'    : 'ministerOfDefense.png'
			};
			break;
	}

	$.ajax({
		type: "POST",
		url: app,
		data: {action: 'government', personalData},
		success: function(data){
			loadGovernmentHtml(data);
		},
		error: function(){
			alert("Something went wrong! Try again later");
		}
	});
}

function callLaboratory(){
	var activeDirection = $("#sciense-directions .direction.direction-active"),
		direction = activeDirection.attr("data-direction");
	
	$.ajax({
		type: "POST",
		url: app,
		data: {action: "laboratory", direction},
		success: function(data){
			loadResearchingHtml(data);
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
		url: app,
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
		url: app,
		data: {action: 'mayor'},
		success: function(data){
			loadMayorHtml(data);
		},
		error: function(){
			alert("Something went wrong! Try again later");
		}
	})
}

/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *
 *
 * 2] Functions for layouts loading with AJAX-queries-results 
 * data. Prefix of functions - load . Postfix of functions -
 * Html
 *
 *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

function loadAmbassadorHtml(sampleData){
	var ambassadorData = $.parseJSON(sampleData);
	$(".data-content").load('layouts/embassy/ambassador.html', function(){
		$(this).find("img").attr("src", "assets/img/embassy/" + ambassadorData.image);
		$(this).find("#name").text(ambassadorData.name);
		$(this).find("#position").text(ambassadorData.article + ambassadorData.position + ":");
		$(this).find("#text").text(ambassadorData.text);
		$(this).find("#ambassador-audience-actions button").text(ambassadorData.answer);
	});

}

function loadBuildingAnimation(sampleData){
	var buildingData = $.parseJSON(sampleData);
	$(".data-content").load('layouts/building/buildingAnimation.html', function(){
		var report = $(this).find("#construction-report"),
			title  = report.find("#report-titleing h2");
		$(this).find("#animation-content")
			   .css("background", "url(assets/gif/"+buildingData.animation+")");
		report.find("#completed-structure")
			  .attr("src", "assets/img/building/"+buildingData.image);
		report.find("#roof-report-text")
			  .text(buildingData.reportRoof);
		report.find("#walls-report-text")
			  .text(buildingData.reportWalls);
		report.find("#windows-report-text")
			  .text(buildingData.reportWindows);
		report.find("#doors-report-text")
			  .text(buildingData.reportDoors);
		title.find("#structure-name")
			  .text(buildingData.structureType);
		title.find("#structure-date")
			  .text(buildingData.date);
		breakAnimation();
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

function loadEmbassySecretaryHtml(){
	$(".data-content").load('layouts/embassy/embassySecretary.html');
}

function loadEmergencyHtml(sampleData){
	var emergencyData 	 = $.parseJSON(sampleData),
		emergencyImage 	 = emergencyData.image,
		emergencyMessage = emergencyData.message;

	$(".data-content").load('layouts/emergency/emergency.html', function(){
		$(this).find("#emergencyImage").attr("src", emergencyImage);
		$(this).find("#conversation p").text(emergencyMessage);
	});
}

function loadEmergencyOperatorHtml(){
	$(".data-content").load('layouts/emergency/emergencyOperator.html');
}

function loadGovernmentHtml(sampleData){
	var governmentData 	= $.parseJSON(sampleData),
		governmentName 	= governmentData.governmentName,
		governmentImage = governmentData.governmentImage,
		governmentText 	= governmentData.governmentGreetings;
	$(".data-content").load('layouts/government/government.html', function(){
		var meeting 	 = $(this).find("#government-meeting"),
			dialogWindow = meeting.find("#conversation p"),
			dialogImage  = meeting.find("img");
		dialogImage.attr("src", "assets/img/government/"+governmentImage);
		dialogWindow.html("<strong>"+governmentName+":</strong><span>"+governmentText+"</span>");
	});
}

function loadGovernmentSecretatyHtml(){
	$(".data-content").load('layouts/government/secretary.html');
}

function loadMassMediaHtml(sampleData){
	var massMediaData = $.parseJSON(sampleData),
		tvData = massMediaData.tv,
		siteData = massMediaData.site;

	$(".data-content").load('layouts/massMedia/massMedia.html', function(){
		$(this).find("#date")
			   .text(massMediaData.date);
		$(this).find("#party-name")
			   .text("#"+massMediaData.name);
		$(this).find("#pc-24-time")
			   .text("Posted at " + tvData.time);
		$(this).find("#pcb-time")
			   .text("Posted at "+siteData.time);
		$(this).find("#pc-24-image")
			   .attr("src", "assets/img/massMedia/" + tvData.image);
		$(this).find("#pc-24 span")
			   .text(tvData.text);
		$(this).find("#pcb-image")
			   .attr("src", "assets/img/massMedia/" + siteData.image);
		$(this).find("#pcb span")
			   .text(siteData.text);
	});
}

function loadMayorHtml(sampleData){
	var mayorData = $.parseJSON(sampleData);
		mayorName = mayorData.mayorName;
		mayorText = mayorData.mayorGreetings;
	$(".data-content").load('layouts/mayor/mayor.html', function(){
		var dialogWindow = $(this).find("#mayor-meeting #conversation p");
		dialogWindow.html("<strong>"+mayorName+":</strong> "+mayorText);
	});
}

function loadMayorSecretatyHtml(){
	$(".data-content").load('layouts/mayor/secretary.html');
}

function loadMainScientistHtml(){
	$(".data-content").load('layouts/laboratory/mainScientist.html');
}

function loadResearchingHtml(sampleData){
	$(".data-content").load('layouts/laboratory/reseaching.html', function(){
		var seachingData = $.parseJSON(sampleData),
			image = seachingData.image,
			name = seachingData.name,
			wiki = seachingData.wiki,
			path = "assets/img/laboratory/",
			report = $("#research-content #research-report");

		report.find('img').attr("src", path + image);
		report.find('.tech-description h2').text(name);
		report.find('.tech-description p a').attr("href", wiki);
		breakAnimation();
	});
}

function loadScienceSettingsHtml(){
	$(".data-content").load('layouts/laboratory/scienceSettings.html', function(){
		checkResearching();
	});
}

