

$(document).ready(function(){
	$("#alert").hide();
	var id=Number(document.location.pathname.substr(document.location.pathname.lastIndexOf('/')+1));
		console.log(id);
		if(!isNaN(id))
		{	
			$("#submitLocation").hide();		
		    $("#updateLocation").show(); 
			UpdateData(id);
			console.log('Update Data');		    
			 EditLocation(id);
		}
		else{
			$("#updateLocation").hide(); 
			$("#submitLocation").show();
			AddLocation();
			console.log("In Add");
		    
		}

	showLocation();
});

function showLocation() {
	$("#alert").hide();
	$.ajax({
		url:SELECTLOCATIONAPI,
		type:"GET",
		success:function(data){
			console.log(data)
			var tableData;
			data.map(function(value,index){
				tableData+="<tr>"+
				"<td class='center'>"+(index+1)+"</td>"+
				"<td class='center'>"+value.locationName+"/"+value.locationName_M+"</td>"+
				"<td class='hidden'></td>"+
				"<td class='hidden'></td>"+
				"<td class='hidden'></td>"+
				"<td class='hidden'></td>"+
				"<td class='center'><span class='green' onClick='updateLocation("+value.locationId+")'>"+
				"<i class='ace-icon fa fa-pencil bigger-130'></i></span><br>"+
				"<span class='red' onClick='deleteLocation("+value.locationId+")'>"+
				"<i class='ace-icon fa fa-trash-o bigger-130'></i></span></td>"+
				"</tr>";
			});
			$("#locationData").html(tableData);		
			tableScript();	
			$('#loader').hide();
		}
	});
}

function deleteLocation(id){
	$("#alert").hide();
	var Delete = confirm("If you delete this City the other data releted to this City will also be deleted.Are You Sure You Want To Delete!");
if (Delete == true) {
	$.ajax({
		url:DELETELOCATIONAPI+"/"+id,
		type:"DELETE",
		success:function(response){
			console.log(response);
			if(response.status)
			{
				$("#alertbox").removeClass("alert-danger");
				$("#alertbox").addClass("alert-success");
				$("#alertMsg").html("Location Deleted Successfully");
		        $("#alertType").html("Success :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
				},5000);				
				$('#loader').show();
				showLocation();
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

function AddLocation(){
	$("#submitLocation").click(function(){
	var locationName = $("#locationName").val();
	var locationName_M = $("#locationName_M").val();
	if(locationName.includes("<script>") || validateForm())
	{
		$("#alertbox").removeClass("alert-success");
		$("#alertbox").addClass("alert-danger");
		$("#alertMsg").html("Enter Location Name");
		$("#alertType").html("Error :");
		$("#alert").show();
		setTimeout(function(){
					$("#alert").hide();
				},5000);
	}
	else
	{	
	$.ajax({
		url:INSERTLOCATIONAPI,
		type:"POST",
		data:{locationName,locationName_M},
		success:function(response){
			console.log(response);
			if(response.status)
			{
				$("#alertbox").removeClass("alert-danger");
				$("#alertbox").addClass("alert-success");
				$("#alertMsg").html("Location Inserted Successfully");
		        $("#alertType").html("Success :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
				},5000);
				clearInputData();
				$('#loader').show();
				showLocation();
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
	});
}

/* Location Edit */
function updateLocation(id){
	$("#alert").hide();
	var Location = confirm("Are You Sure You Want To Edit!");
if (Location == true) { 
		window.location.pathname=LOCATION+"/"+id;
}
else{
	console.log(false);
}
}

function UpdateData(id){
	$.ajax({
		url:SELECTLOCATIONAPI+'/'+id, 
		type:"GET",
		success:function(data){
			console.log(data,'data');
			data.map(function(updatedata,index){

	 $('#locationName').val(updatedata.locationName);
     $('#locationName_M').val(updatedata.locationName_M);
    
			  }); 
			}
		});
}

function EditLocation(id){
$("#updateLocation").click(function(){
	var locationName = $("#locationName").val();
	var locationName_M = $("#locationName_M").val();
	if(locationName.includes("<script>") || validateForm())
	{
		$("#alertbox").removeClass("alert-success");
		$("#alertbox").addClass("alert-danger");
		$("#alertMsg").html("Enter Location Name");
		$("#alertType").html("Error :");
		$("#alert").show();
		setTimeout(function(){
					$("#alert").hide();
				},5000);
	}
	else
	{	
	$.ajax({
		url:UPDATELOCATIONAPI,
		type:"POST",
		data:{locationName,locationName_M,id},
		success:function(response){
			console.log(response);
			if(response.status)
			{
				$("#alertbox").removeClass("alert-danger");
				$("#alertbox").addClass("alert-success");
				$("#alertMsg").html("Location Updated Successfully");
		        $("#alertType").html("Success :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
				},5000);
				clearInputData();
				$('#loader').show();
				$("#updateCat").hide(); 
			     $("#SubmitCat").show();
				window.location.pathname=LOCATION;
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
	});
}