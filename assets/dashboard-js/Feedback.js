

$(document).ready(function() {
	$("#alert").hide();
	showFeedback();	
});

function showFeedback(){
	$.ajax({
		url:SELECTFEEDBACKAPI,
		type:"GET",
		success:function(data){
			var tableData;
			data.map(function(value,index){
				tableData+="<tr>"+
				"<td class='center'>"+(index+1)+"</td>"+
				"<td class='center'>"+value.name+"</td>"+
				"<td class='center'>"+value.mobile+"</td>"+
				"<td class='center'>"+value.email+"</td>"+
				"<td class='center'>"+value.message+"</td>"+
				"<td class='hidden'></td>"+
				"<td class='hidden'></td>"+
				// "<td class='center'><span class='red' onClick='deleteFeedback("+value.feedbackId+")'>"+
				// "<i class='ace-icon fa fa-trash-o bigger-130'></i></span></td>"+
				"</tr>";
			});
			$("#feedbackData").html(tableData);		
			tableScript();	
			$('#loader').hide();
		}
	});
}



function deleteFeedback(id){
	$("#alert").hide();
	var Delete = confirm("Are You Sure You Want To Delete!");
if (Delete == true) {
	$.ajax({
		url:DELETEFEEDBACKAPI+"/"+id,
		type:"DELETE",
		success:function(response){
			console.log(response);
			if(response.status)
			{
				$("#alertbox").removeClass("alert-danger");
				$("#alertbox").addClass("alert-success");
				$("#alertMsg").html("Feedback Deleted Successfully");
		        $("#alertType").html("Success :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
				},5000);
				showFeedback();
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
