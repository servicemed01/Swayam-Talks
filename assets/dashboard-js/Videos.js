

/* For Category*/
var count=0;
console.log("isShowPage",isShowPage);
$(document).ready(function() {


		if(!isShowPage){


	//SelectType();
	//$('#eventDiv').hide();
	$.ajax({
	url:SELECTCATEGORYAPI,
	type:"GET",
	success:function(response) {
		//console.log(response);
		var options="<option>Select Category</option>";
		response.map(function(value,index){
			options+="<option value="+value.categoryId+">"+value.categoryName+"</option>";
			count++;
			if(count===3 && !isShowPage){
	$('#loader').hide();
}
 });
	$("#categoryId").html(options);
	}
});
/* For Location */
	$.ajax({
		url:SELECTLOCATIONAPI,
		type:"GET",
		success:function(response){
			//console.log(response);
			var option="<option> Select City </option>";
			response.map(function(value,index){
				option+="<option value="+value.locationId+">"+value.locationName+"</option>";
				count++;
				if(count===3 && !isShowPage){
	            $('#loader').hide();
                }
			});
			$("#locationId").html(option);
		}
	});


/* For Speaker */
$.ajax({
		url:SELECTSPEAKERAPI,
		type:"GET",
		success:function(response){
			//console.log(response);
			var option="<option> Select Speaker </option>";
			response.map(function(value,index){
				option+="<option value="+value.speakerId+">"+value.name+"</option>";
				count++;
				if(count===3 && !isShowPage){
	   $('#loader').hide();
   }
			});
			$("#speakerId").html(option);
		}
	});

/* For Event */
$.ajax({
		url:SELECTEVENTAPI,
		type:"GET",
		success:function(response){
			//console.log(response);
			var option="<option> Select Event </option>";
			response.map(function(value,index){
				option+="<option value="+value.eventId+">"+value.eventTitle+"</option>";
				count++;
				if(count===4 && !isShowPage){
	   $('#loader').hide();
   }
			});
			$("#eventId").html(option);
		}
	});
}
		var id=Number(document.location.pathname.substr(document.location.pathname.lastIndexOf('/')+1));
		console.log(id);
		if(!isNaN(id))
		{	
			$("#submitVideo").hide();		
		    $("#updateVideo").show(); 
			UpdateData(id);
			console.log('Update Data');		    
			 Editvideo(id);
		}
		else{
			$("#updateVideo").hide(); 
			$("#submitVideo").show();
			AddVideo();
			console.log("In Add");
		    
		}
		
	
            $("#videoType").change(function(e) {
            	console.log(e.target.value);
                if (e.target.value !== "Swayam Talks") 
                    $("#eventDiv").hide();
                else
                    $("#eventDiv").show();
            });
   
            if(isShowPage)
     showVideos();  
  });


function showVideos() {
	$.ajax({
		url:SELECTVIDEOAPI,
		type:"GET",
		success:function(data){
			var tableData;
			data.map(function(value,index){
				tableData+="<tr>"+
				"<td class='center'>"+(index+1)+"</td>"+
				"<td class='center'>"+value.videoName+" / "+value.videoName_M+"</td>"+
				"<td class='center'><img src='"+value.photo+"' width='200px' height='170px'></td>"+
				"<td class='center'><iframe width='200px' height='170px' src='https://www.youtube.com/embed/"+youtube_parser(value.videoPath)+"?controls=1' allowfullscreen></iframe></td>"+
				"<td class='center'>"+value.videoDescription+"<br><br>"+value.videoDescription_M+" <br><br> Category : "+value.categoryName+"<br><br> Location : "+value.locationName+"<br><br> Video Type : "+value.videoType+"</td>"+
				"<td class='center'>"+value.name+"</td>"+
				"<td class='center'><span class='green' onClick='updateVideo("+value.videoId+")'>"+
				"<i class='ace-icon fa fa-pencil bigger-130'></i></span><br>"+
				"<span class='red' onClick='deleteVideos("+value.videoId+")'>"+
				"<i class='ace-icon fa fa-trash-o bigger-130'></i></span></td>"+
				"</tr>";
			});
			$("#videoData").html(tableData);		
			tableScript();	
			if(isShowPage)
			$('#loader').hide();
		}
	});
}



function deleteVideos(id){
	$("#alert").hide();
	var Delete = confirm("If you delete this video the other data releted to this video will also be deleted.Are You Sure You Want To Delete!");
if (Delete == true) {
	$.ajax({
		url:DELETEVIDEOAPI+"/"+id,
		type:"DELETE",
		success:function(response){
			console.log(response);
			if(response.status)
			{
				$("#alertbox").removeClass("alert-danger");
				$("#alertbox").addClass("alert-success");
				$("#alertMsg").html("Speaker Deleted Successfully");
		        $("#alertType").html("Success :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
				},5000);
				 $('#loader').show();
				 showVideos();
				  $("#dynamic-table").dataTable().fnDestroy();
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

/* For Add Video */
function AddVideo(){
	$("#alert").hide();
 	$('#submitVideo').click(function() {
 		$("#loader").show();
 	 categoryId = $('#categoryId').val();
     locationId = $('#locationId').val();
     videoName  = $('#videoName').val();
     videoPath  = $('#videoPath').val();
     videoDescription = $('#videoDescription').val();
     speakerId  = $('#speakerId').val();
     keywords   = $('#keywords').val();
     videoName_M  = $('#videoName_M').val();
     videoType = $('#videoType').val();      
     videoInterview  = isInterview();
     eventId  = $('#eventId').val();
     videoDescription_M = $('#videoDescription_M').val();
if(validateForm())
	{
		$("#alertbox").removeClass("alert-success");
		$("#alertbox").addClass("alert-danger");
		$("#alertMsg").html("Enter All * Fields");
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
	formData.append(" categoryId",categoryId);
    formData.append(" locationId",locationId);
    formData.append(" videoName",videoName);
    formData.append(" videoPath",videoPath);
    formData.append(" photo", $('#photo').prop('files')[0]);
    formData.append(" videoDescription",videoDescription);
    formData.append(" speakerId",speakerId);
    formData.append(" eventId",eventId);
    formData.append(" keywords",keywords);
    formData.append(" videoName_M",videoName_M);
    formData.append(" videoDescription_M",videoDescription_M);
    formData.append(" videoType",videoType);
    formData.append(" videoInterview",videoInterview);
    $.ajax({
    	url:INSERTVIDEOAPI,
    	type:"POST",
    	data:formData,
    	processData: false, // important
        contentType: false, // important
    	success:function(response){
    		if(response.status)
			{
				$("#alertbox").removeClass("alert-danger");
				$("#alertbox").addClass("alert-success");
				$("#alertMsg").html("Video Inserted Successfully");
		        $("#alertType").html("Success :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
				},5000);
				clearInputData();
				$("#loader").hide();
		          scrollToTop();
				window.location.pathname=SHOWVIDEOS;
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

/* Video Edit */
function updateVideo(id){
	$("#alert").hide();
	var Video = confirm("Are You Sure You Want To Edit!");
if (Video == true) { 
		window.location.pathname=VIDEO+"/"+id;
}
else{
	console.log(false);
}
}


var oldPhoto ;
function UpdateData(id){
	$.ajax({
		url:SELECTVIDEOAPI+'/'+id, 
		type:"GET",
		success:function(data){
			console.log(data,'data');
			data.map(function(updatedata,index){
updatedata.videoType==="Swayam Talks" && $('#eventDiv').show();
setInterview(updatedata.videoInterview)
			$('#categoryId').val(updatedata.categoryId).attr("selected","selected");
			$('#locationId').val(updatedata.locationId).attr("selected","selected");
			$('#videoName').val(updatedata.videoName);
			$('#videoPath').val(updatedata.videoPath);
			$('#videoDescription').val(updatedata.videoDescription);
			$('#speakerId').val(updatedata.speakerId).attr("selected","selected");
			$('#eventId').val(updatedata.eventId).attr("selected","selected");
			$('#keywords').val(updatedata.keywords);
			$('#videoName_M').val(updatedata.videoName_M);
			$('#videoDescription_M').val(updatedata.videoDescription_M);
			$('#videoType').val(updatedata.videoType).attr("selected","selected");     
		  		 oldPhoto = updatedata.photo;
		  		  console.log("old",oldPhoto);
  
			  }); 
			}
		});
}

function Editvideo(id){
	$("#alert").hide();
	$('#updateVideo').click(function() {
		$("#loader").show();
 	 categoryId = $('#categoryId').val();
     locationId = $('#locationId').val();
     videoName  = $('#videoName').val();
     videoPath  = $('#videoPath').val();
     videoDescription = $('#videoDescription').val();
     speakerId  = $('#speakerId').val();
     eventId  = $('#eventId').val();
     keywords   = $('#keywords').val();
     videoName_M  = $('#videoName_M').val();
     videoType  = $('#videoType').val();
     videoInterview  = isInterview();
     videoDescription_M = $('#videoDescription_M').val();
     if(validateForm())
	{
		$("#alertbox").removeClass("alert-success");
		$("#alertbox").addClass("alert-danger");
		$("#alertMsg").html("Enter All * Fields");
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
		var formData1=new FormData();
			var newPhoto=$('#photo').prop('files');
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
	formData1.append(" categoryId",categoryId);
    formData1.append(" locationId",locationId);
    formData1.append(" videoName",videoName);
    formData1.append(" videoPath",videoPath);
    formData1.append(" photo", newPhoto);
    formData1.append(" videoDescription",videoDescription);
    formData1.append(" speakerId",speakerId);
    formData1.append(" eventId",eventId);
    formData1.append(" keywords",keywords);
    formData1.append(" videoName_M",videoName_M);
    formData1.append(" videoDescription_M",videoDescription_M);
    formData1.append(" videoType",videoType);
    formData1.append(" videoInterview",videoInterview);
    formData1.append("id",id);
    $.ajax({
    	url:UPDATEVIDEOAPI,
    	type:"POST",
    	data:formData1,
    	processData: false, // important
        contentType: false, // important
    	success:function(response){
    		if(response.status)
			{
				$("#alertbox").removeClass("alert-danger");
				$("#alertbox").addClass("alert-success");
				$("#alertMsg").html("Video Updated Successfully");
		        $("#alertType").html("Success :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
				},5000);
				clearInputData();
				$("#loader").hide();
		          scrollToTop();
				window.location.pathname=SHOWVIDEOS;
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

// function SelectType(){
// 	$('#Vtype').change(function(e){
// 	 console.log(e);
// 	var Url = e.target.value==="Swayam Talks"?SELECTTALKSAPI:SELECTSTORYAPI;
// 	showVideos(Url);
// 	 $("#dynamic-table").dataTable().fnDestroy();
// })
// }




function isInterview() {
	var temp;
		$('input[name=videoInterview]').each(function(index,ele) {
			if(ele.checked)temp= ele.value;
		});
		return temp;
}

function setInterview(val) {
		$('input[name=videoInterview]').each(function(index,ele) {
			if(ele.value===val)ele.checked=true;
		});
}