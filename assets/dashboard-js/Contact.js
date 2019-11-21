

$(document).ready(function() {
	$("#alert").hide();
	showContact();	
});

function showContact(){
	$.ajax({
		url:SELECTCONTACTAPI,
		type:"GET",
		success:function(data){
			var tableData;
			data.map(function(value,index){
				tableData+="<tr>"+
				"<td class='center'>"+(index+1)+"</td>"+
				"<td class='center'>"+value.contactName+"</td>"+
				"<td class='center'>"+value.contactEmail+"</td>"+
				"<td class='center'>"+value.contactSubject+"</td>"+
				"<td class='center'>"+value.contactMessage+"</td>"+
				"<td class='hidden'></td>"+
				"<td class='hidden'></td>"+
				// "<td class='center'><span class='red' onClick='deleteContact("+value.contactId+")'>"+
				// "<i class='ace-icon fa fa-trash-o bigger-130'></i></span></td>"+
				"</tr>";
			});
			$("#contactData").html(tableData);		
			tableScript();	
			$('#loader').hide();
		}
	});
}



function deleteContact(id){
	$("#alert").hide();
	$.ajax({
		url:DELETECONTACTAPI+"/"+id,
		type:"DELETE",
		success:function(response){
			console.log(response);
			if(response.status)
			{
				$("#alertbox").removeClass("alert-danger");
				$("#alertbox").addClass("alert-success");
				$("#alertMsg").html("Contact Deleted Successfully");
		        $("#alertType").html("Success :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
				},5000);
				showContact();
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
