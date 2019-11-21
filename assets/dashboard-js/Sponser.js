
$(document).ready(function(){
		$("#alert").hide();

		var id=Number(document.location.pathname.substr(document.location.pathname.lastIndexOf('/')+1));
		console.log(id);
		if(!isNaN(id))
		{	
			$("#submitSponser").hide();		
		    $("#updateSponser").show(); 
			UpdateData(id);
			console.log('Update Data');		    
			 EditSponser(id);
		}
		else{
			$("#updateSponser").hide(); 
			$("#submitSponser").show();
			AddSponser();
			console.log("In Add");
		    
		}
		GetLocation();		
	
showSponser();
});


function showSponser(){
	$("#alert").hide();
	$.ajax({
		url:SELECTSPONSERAPI,
		type:"GET",
		success:function(data){
			console.log(data)
			var tableData;
			data.map(function(value,index){
				tableData+="<tr>"+
				"<td class='center'>"+(index+1)+"</td>"+
				"<td class='center'>"+value.sponserName+"</td>"+
				"<td class='center'><img src='"+value.sponserImage+"' width='200px' height='170px'></td>"+
				"<td class='center'>"+value.locationName+"</td>"+
				"<td class='hidden'></td>"+
				"<td class='hidden'></td>"+
				"<td class='center'><span class='green' onClick='updateSponser("+value.sponserId+")'>"+
				"<i class='ace-icon fa fa-pencil bigger-130'></i></span><br>"+
				"<span class='red' onClick='deleteSponser("+value.sponserId+")'>"+
				"<i class='ace-icon fa fa-trash-o bigger-130'></i></span></td>"+
				"</tr>";
			});
			$("#sponserData").html(tableData);		
			tableScript();	
			$('#loader').hide();
		}
	});
}

function deleteSponser(id){
	$("#alert").hide();
	var Delete = confirm("If you delete this sponsor the other data releted to this sponsor will also be deleted.Are You Sure You Want To Delete!");
if (Delete == true) {
	$.ajax({
		url:DELETESPONSERAPI+"/"+id,
		type:"DELETE",
		success:function(response){
			console.log(response);
			if(response.status)
			{
				$("#alertbox").removeClass("alert-danger");
				$("#alertbox").addClass("alert-success");
				$("#alertMsg").html("Sponser Deleted Successfully");
		        $("#alertType").html("Success :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
				},5000);				
				$('#loader').show();
				showSponser();
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


function GetLocation(){
	/* For Location */
	$.ajax({
		url:SELECTLOCATIONAPI,
		type:"GET",
		success:function(response){
			//console.log(response);
			var option="<option> Select Location </option>";
			response.map(function(value,index){
				option+="<option value="+value.locationId+">"+value.locationName+"</option>";
				
	            $('#loader').hide();
			});
			$("#locationId").html(option);
		}
	});

}


function AddSponser(){
	$('#submitSponser').click(function() {
	var sponserName = $('#sponserName').val();
     var  locationId = $('#locationId').val();
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
	formData.append("sponserName",sponserName);
     formData.append("locationId",locationId);
    formData.append(" sponserImage", $('#sponserImage').prop('files')[0]);
	$.ajax({
    	url:INSERTSPONSERAPI,
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
				$("#alertMsg").html("Sponser Inserted Successfully");
		        $("#alertType").html("Success :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
				},5000);
				clearInputData();
				$("#loader").hide();
		          scrollToTop();
				window.location.pathname=SHOWSPONSER;
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

/* Sponser Edit */
function updateSponser(id){
	$("#alert").hide();
	var Sponser = confirm("Are You Sure You Want To Edit!");
if (Sponser == true) { 
		window.location.pathname=SPONSER+"/"+id;
}
else{
	console.log(false);
}
}

var oldPhoto ;
function UpdateData(id){
	$.ajax({
		url:SELECTSPONSERAPI+'/'+id, 
		type:"GET",
		success:function(data){
			console.log(data,'data');
			data.map(function(updatedata,index){

			$('#sponserName').val(updatedata.sponserName);
			$('#locationId').val(updatedata.locationId).attr("selected","selected");    
		  		 oldPhoto = updatedata.sponserImage;
		  		  console.log("old",oldPhoto);
  
			  }); 
			}
		});
}


function EditSponser(id){
	$('#updateSponser').click(function() {
	var sponserName = $('#sponserName').val();
     var  locationId = $('#locationId').val();
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
var newPhoto=$('#sponserImage').prop('files');
                if(newPhoto.length===0)
                {
                	newPhoto=oldPhoto;
                	console.log("In if",oldPhoto);
                }
                else
                {
                	newPhoto=newPhoto[0];
                }
	formData1.append("sponserName",sponserName);
     formData1.append("locationId",locationId);
    formData1.append(" sponserImage",newPhoto);
     formData1.append("id",id);
    console.log("shubham",newPhoto);
	$.ajax({
    	url:UPDATESPONSERAPI,
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
				$("#alertMsg").html("Sponser Updated Successfully");
		        $("#alertType").html("Success :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
				},5000);
				clearInputData();
				$("#loader").hide();
		          scrollToTop();
				window.location.pathname=SHOWSPONSER;
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