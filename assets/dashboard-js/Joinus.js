$(document).ready(function() {
	$("#alert").hide();
	 $("#dynamic-table").dataTable().fnDestroy();	
	location.pathname.includes('SponsorsJoinus')&&showSponsersJoinus();
	location.pathname.includes('OrganizerJoinus')&&showOrganizerJoinus();
	location.pathname.includes('AudianceJoinus')&&showAudianceJoinus();	
	location.pathname.includes('SpeakerJoinus')&&showSpeakerJoinus();
});


// Show Sponser
function showSponsersJoinus(){
	$.ajax({
		url:SHOWSPONSERJOIN,
		type:"GET",
		success:function(data){
			var tableData;
			data.map(function(value,index){
				tableData+="<tr>"+
				"<td class='center'>"+(index+1)+"</td>"+
				"<td class='center'>"+value.name+"</td>"+
				"<td class='center'>"+value.emailid+"</td>"+
				"<td class='center'>"+value.mobile+"</td>"+
				"<td class='center'>"+value.orgname+"</td>"+				
				"<td class='center'>"+value.address+"</td>"+
				"<td class='hidden'></td>"+
				"</tr>";
			});
			$("#SponserJoinus").html(tableData);
	        $("#dynamic-table").dataTable().fnDestroy();		
			tableScript();	
			$('#loader').hide();
		}
	});
}

// Show Organizer
function showOrganizerJoinus(){
	$.ajax({
		url:SHOWORGANIZERJOIN,
		type:"GET",
		success:function(data){
			var tableData;
			data.map(function(value,index){
				tableData+="<tr>"+
				"<td class='center'>"+(index+1)+"</td>"+
				"<td class='center'>"+value.name+"</td>"+
				"<td class='center'>"+value.emailid+"</td>"+
				"<td class='center'>"+value.mobile+"</td>"+
				"<td class='center'>"+value.orgname+"</td>"+				
				"<td class='center'>"+value.address+"</td>"+
				"<td class='hidden'></td>"+
				"</tr>";
			});
			$("#OrganizerJoinus").html(tableData);			
	        $("#dynamic-table").dataTable().fnDestroy();		
			tableScript();	
			$('#loader').hide();
		}
	});
}

// Show Audiance
function showAudianceJoinus(){
	$.ajax({
		url:SHOWAUDIANCEJOIN,
		type:"GET",
		success:function(data){
			var tableData;
			data.map(function(value,index){
				tableData+="<tr>"+
				"<td class='center'>"+(index+1)+"</td>"+
				"<td class='center'>"+value.name+"</td>"+	
				"<td class='center'>"+value.emailid+"</td>"+
				"<td class='center'>"+value.mobile+"</td>"+			
				"<td class='center'>"+value.address+"</td>"+				
				"<td class='hidden'></td>"+
				"<td class='hidden'></td>"+
				"</tr>";
			});
			$("#AudianceJoinus").html(tableData);
	        $("#dynamic-table").dataTable().fnDestroy();	
			tableScript();	
			$('#loader').hide();
		}
	});
}

// Show Speaker
function showSpeakerJoinus(){
	$.ajax({
		url:SHOWSPEAKERJOIN,
		type:"GET",
		success:function(data){
			var tableData;
			data.map(function(value,index){
				tableData+="<tr>"+
				"<td class='center'>"+(index+1)+"</td>"+
				"<td class='center'>"+value.name+"</td>"+
				"<td class='center'>"+value.emailid+"</td>"+
				"<td class='center'>"+value.mobile+"</td>"+				
				"<td class='center'>"+value.address+"</td>"+				
				"<td class='hidden'></td>"+
				"<td class='hidden'></td>"+
				"</tr>";
			});
			$("#SpeakerJoinus").html(tableData);			
	        $("#dynamic-table").dataTable().fnDestroy();		
	 		tableScript();	
			$('#loader').hide();
		}
	});
}