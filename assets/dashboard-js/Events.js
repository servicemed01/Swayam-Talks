
$(document).ready(function(){
		$("#alert").hide();
		GetLocation();
        GetSpeaker();
        GetSponser();
        showEvents();
		var id=Number(document.location.pathname.substr(document.location.pathname.lastIndexOf('/')+1));
		console.log(id);
		if(!isNaN(id))
		{	
			$("#submitEvents").hide();		
		    $("#updateEvents").show(); 
			UpdateData(id);
			console.log('Update Data');		    
			 EditEvents(id);
		}
		else{
			$("#updateEvents").hide(); 
			$("#submitEvents").show();
			AddEvents();
			console.log("In Add");
		    
		}



});
/* Display Speaker */
function GetSpeaker(list=false){
	console.log("list",list);
	$.ajax({
		url:SELECTSPEAKERAPI,
		type:"GET",
		success:function(response){
			console.log(response);			
			response.map(function(value,index){
				var option=document.createElement('option');
				option.value=value.speakerId;
				option.innerText=value.name;
				if(list){
					list.forEach(function(val,ind){
						if(val==value.speakerId)
						{
							$(option).attr("selected",true);
						}
					})
					
				}
				$("#speakerId").append(option);
				
			});
			
			multiselect("speakerId");
		}
	});
}

/* Get Sponser */
function GetSponser(lists=false){
	$("#sponserId").attr('multiple','');
	$.ajax({
		url:SELECTSPONSERAPI,
		type:"GET",
		success:function(response){
			console.log(response);
			response.map(function(values,index){
				var option=document.createElement('option');
				option.value=values.sponserId;
				option.innerText=values.sponserName;

				if(lists){

					lists.forEach(function(vals,ind){
						if(vals==values.sponserId)
						{
							$(option).attr("selected",true);
						}
						
					})
				}
				$("#sponserId").append(option);
	            $('#loader').hide();
			});
			multiselect("sponserId");
		}
	});

}


/* Display Events */
function showEvents(){
	$("#alert").hide();
	$.ajax({
		url:SELECTEVENTAPI,
		type:"GET",
		success:function(data){
			//console.log(data)
			var tableData;
			data.map(function(value,index){
					var names='';
				value.speakerNames.length>0 && value.speakerNames.map(function(sname,index){
						names+=(index+1)+". "+sname.name+"<br>";
				});
				var Sponsers='';
				value.sponserName.length>0 && value.sponserName.map(function(sname,index){
						Sponsers+=(index+1)+". "+sname.sponserName+"<br>";
				});
				tableData+="<tr>"+
				"<td class='center'>"+(index+1)+"</td>"+
				"<td class='center'>"+value.eventTitle+"/"+value.eventTitle_M+"</td>"+
				"<td class='center'>"+value.eventDescription+"/"+value.eventDescription_M+"</td>"+
				"<td class='center'>"+value.locationName+" <br> Event Date : "+value.eventDate+"</td>"+
				"<td>"+names+"</td>"+
				"<td>"+Sponsers+"</td>"+
				"<td class='center'><span class='green' onClick='updateEvents("+value.eventId+")'>"+
				"<i class='ace-icon fa fa-pencil bigger-130'></i></span><br>"+
				"<span class='red' onClick='deleteEvents("+value.eventId+")'>"+
				"<i class='ace-icon fa fa-trash-o bigger-130'></i></span></td>"+
				"</tr>";
			});
			$("#eventData").html(tableData);		
			tableScript();	
			$('#loader').hide();
		}
	});
}

/* Delete Evants */
function deleteEvents(id){
	$("#alert").hide();
	var Delete = confirm("If you delete this event the other data releted to this event will also be deleted.Are You Sure You Want To Delete!");
if (Delete == true) {
	$.ajax({
		url:DELETEEVENTAPI+"/"+id,
		type:"DELETE",
		success:function(response){
			console.log(response);
			if(response.status)
			{
				$("#alertbox").removeClass("alert-danger");
				$("#alertbox").addClass("alert-success");
				$("#alertMsg").html("Events Deleted Successfully");
		        $("#alertType").html("Success :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
				},5000);
				$('#loader').show();
				$("#dynamic-table").dataTable().fnDestroy();
				showEvents();
					
			}
			else{
				$("#alertbox").removeClass("alert-success");
				$("#alertbox").addClass("alert-danger");
				$("#alertMsg").html("Something Went Wrong");
				$("#alertType").html("Error :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
				},5000);
			}
		}
	}); 
}
else{
	console.log(false);
}
}


/* Multi Select Dropdown */
function multiselect(id){ 
	$('.'+id).multiselect('destroy');
	$('.'+id).multiselect({
				 enableFiltering: true,
				 enableHTML: true,
				 buttonClass: 'btn btn-white btn-primary',
				 templates: {
					button: '<button type="button" class="multiselect dropdown-toggle" data-toggle="dropdown"><span class="multiselect-selected-text"></span> &nbsp;<b class="fa fa-caret-down"></b></button>',
					ul: '<ul class="multiselect-container dropdown-menu"></ul>',
					filter: '<li class="multiselect-item filter"><div class="input-group"><span class="input-group-addon"><i class="fa fa-search"></i></span><input class="form-control multiselect-search" type="text"></div></li>',
					filterClearBtn: '<span class="input-group-btn"><button class="btn btn-default btn-white btn-grey multiselect-clear-filter" type="button"><i class="fa fa-times-circle red2"></i></button></span>',
					li: '<li id='+id+'><a tabindex="0"><label></label></a></li>',
			        divider: '<li class="multiselect-item divider"></li>',
			        liGroup: '<li class="multiselect-item multiselect-group"><label></label></li>'
				 }
				});
}


/* Get Location */
function GetLocation(){
	/* For Location */
	$.ajax({
		url:SELECTLOCATIONAPI,
		type:"GET",
		success:function(response){
			//console.log(response);
			var option="<option> Select City </option>";
			response.map(function(value,index){
				option+="<option value="+value.locationId+">"+value.locationName+"</option>";				
	            $('#loader').hide();
			});
			$("#locationId").html(option);
		}
	});

}

/* Edit Events */
function updateEvents(id){
	$("#alert").hide();
	var Edit = confirm("Are You Sure You Want To Edit!");
if (Edit == true) { 
		window.location.pathname=EVENTS+"/"+id;
}
else{
	console.log(false);
}
}

var oldPhoto ;
function UpdateData(id){
	$.ajax({
		url:SELECTEVENTAPI+'/'+id, 
		type:"GET",
		success:function(data){
			console.log(data,'data');
			data.map(function(updatedata,index){
				$('#eventTitle').val(updatedata.eventTitle);
                $('#eventDescription').val(updatedata.eventDescription);
	            $('#eventTitle_M').val(updatedata.eventTitle_M);
                $('#eventDescription_M').val(updatedata.eventDescription_M);
                $('#eventAddress').val(updatedata.eventAddress);
                $('#eventDate').val(updatedata.eventDate);
                $('#locationId').val(updatedata.locationId).attr("selected",true);
                $('#eventTicket').val(updatedata.eventTicket);
                 oldPhoto = updatedata.eventImage;
                console.log(updatedata.locationId,"old",oldPhoto);
                /*Speaker*/
                $('#speakerId').multiselect('destroy');
                $("#speakerId").html("<option> Select Speaker </option>");
                GetSpeaker(updatedata.speakerId.split(','));

                /*Sponser*/
                $('#sponserId').multiselect('destroy');
                $("#sponserId").html("<option> Select Sponsor </option>");
                GetSponser(updatedata.sponserId.split(','));
			  }); 
			}
		});
}
 
function EditEvents(id){

$('#updateEvents').click(function() {
	if(validateForm()){
	
		$("#alertbox").removeClass("alert-success");
		$("#alertbox").addClass("alert-danger");
		$("#alertMsg").html("Enter All Fields");
		$("#alertType").html("Error :");
		$("#alert").show();
		setTimeout(function(){
				$("#alert").hide();
				},5000);
		$("#loader").hide();
		scrollToTop();
	
	}
	else
	{	
	var  formData1 =new FormData();
	var newPhoto=$('#eventImage').prop('files');
                if(newPhoto.length===0)
                {
                	newPhoto=oldPhoto;
                	console.log("In if",oldPhoto);
                }
                else
                {
                	newPhoto=newPhoto[0];
                }
                console.log("shubham",newPhoto);
	formData1.append(" eventTitle",$('#eventTitle').val());
    formData1.append(" eventDescription",$('#eventDescription').val());
    formData1.append(" locationId",$('#locationId').val());
    formData1.append(" eventImage",newPhoto );
    formData1.append("eventTitle_M",$('#eventTitle_M').val());
    formData1.append(" eventDescription_M",$('#eventDescription_M').val());
    formData1.append("speakerId",$('#speakerId').val());
    formData1.append("sponserId",$('#sponserId').val());
    formData1.append("eventAddress",$('#eventAddress').val());
    formData1.append("eventDate",$('#eventDate').val());
    formData1.append("eventTicket",$('#eventTicket').val());
    formData1.append("id",id);
     console.log(formData1);
	$.ajax({
    	url:UPDATEEVENTAPI,
    	type:"POST",
    	data:formData1,
    	processData: false, // important
        contentType: false, // important
    	success:function(response){
    		console.log(response);
			if(response.status)
			{
				$("#alertbox").removeClass("alert-danger");
				$("#alertbox").addClass("alert-success");
				$("#alertMsg").html("Event Updated Successfully");
		        $("#alertType").html("Success :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
				},5000);
				clearInputData();
				$("#loader").hide();
		        scrollToTop();
				window.location.pathname=SHOWEVENTS;
			}
			else{
				$("#alertbox").removeClass("alert-success");
				$("#alertbox").addClass("alert-danger");
				$("#alertMsg").html("Something Went Wrong");
				$("#alertType").html("Error :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
				},5000);
				$("#loader").hide();
		         scrollToTop();
			}
		}
	}); 
}
});
}

function AddEvents(){  
	$('#submitEvents').click(function() {
	var eventTitle = $('#eventTitle').val();
    var  eventDescription = $('#eventDescription').val();
	var eventTitle_M = $('#eventTitle_M').val();
    var  eventDescription_M = $('#eventDescription_M').val();
    var eventAddress = $('#eventAddress').val();
    var eventDate = $('#eventDate').val();
    var eventTicket =$('#eventTicket').val();
if(validateForm()){
	
		$("#alertbox").removeClass("alert-success");
		$("#alertbox").addClass("alert-danger");
		$("#alertMsg").html("Enter All Fields");
		$("#alertType").html("Error :");
		$("#alert").show();
		setTimeout(function(){
				$("#alert").hide();
				},5000);
		$("#loader").hide();
		scrollToTop();
	
	}
	else
	{	
var formData=new FormData();
	formData.append("eventTitle",eventTitle);
    formData.append(" eventDescription",eventDescription);
    formData.append(" locationId",$('#locationId').val());
    formData.append(" eventImage", $('#eventImage').prop('files')[0]);
    formData.append("eventTitle_M",eventTitle_M);
    formData.append(" eventDescription_M", eventDescription_M);
    formData.append("speakerId",$('#speakerId').val());
    formData.append("sponserId",$('#sponserId').val());
    formData.append("eventAddress",eventAddress);
    formData.append("eventDate",eventDate);
    formData.append("eventTicket",eventTicket);
     console.log(formData);
	$.ajax({
    	url:INSERTEVENTAPI,
    	type:"POST",
    	data:formData,
    	processData: false, // important
        contentType: false, // important
    	success:function(response){
    		console.log(response);
			if(response.status)
			{
				$("#alertbox").removeClass("alert-danger");
				$("#alertbox").addClass("alert-success");
				$("#alertMsg").html("Event Inserted Successfully");
		        $("#alertType").html("Success :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
				},5000);
				clearInputData();
				$("#loader").hide();
		          scrollToTop();
				window.location.pathname=SHOWEVENTS;
			}
			else{
				$("#alertbox").removeClass("alert-success");
				$("#alertbox").addClass("alert-danger");
				$("#alertMsg").html("Something Went Wrong");
				$("#alertType").html("Error :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
				},5000);
				$("#loader").hide();
		         scrollToTop();
			}
		}
	}); 
}
	});
}

