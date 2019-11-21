
$(document).ready(function(){
	$("#alert").hide();
	$("#submitFaq").click(function(){
	var question = $("#question").val();
	var answer = $("#answer").val();
	if(question.includes("<script>") || question=="" || answer=="")
	{
		$("#alertbox").removeClass("alert-success");
		$("#alertbox").addClass("alert-danger");
		$("#alertMsg").html("Enter FAQ Question And Answer");
		$("#alertType").html("Error :");
		$("#alert").show();
		setTimeout(function(){
					$("#alert").hide();
				},5000);
	}
	else
	{	
	$.ajax({
		url:INSERTFAQAPI,
		type:"POST",
		data:{question , answer },
		success:function(response){
			console.log(response);
			if(response.status)
			{
				$("#alertbox").removeClass("alert-danger");
				$("#alertbox").addClass("alert-success");
				$("#alertMsg").html("FAQ Question And Answer Inserted Successfully");
		        $("#alertType").html("Success :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
				},5000);
				clearInputData();
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
		ShowFaq();
});

function ShowFaq() {
	$("#alert").hide();
	$.ajax({
		url:SELECTFAQAPI,
		type:"GET",
		success:function(data){
			console.log(data)
			var tableData;
			data.map(function(value,index){
				tableData+="<tr>"+
				"<td class='center'>"+(index+1)+"</td>"+
				"<td class='center'>"+value.question+"</td>"+
				"<td class='center'>"+value.answer+"</td>"+
				"<td class='hidden'></td>"+
				"<td class='hidden'></td>"+
				"<td class='hidden'></td>"+
				"<td class='center'><span class='red' onClick='deleteFaq("+value.faqId+")'>"+
				"<i class='ace-icon fa fa-trash-o bigger-130'></i></span></td>"+
				"</tr>";
			});
			$("#faqData").html(tableData);		
			tableScript();	
			$('#loader').hide();
		}
	});
}

function deleteFaq(id){
	$("#alert").hide();
	var Delete = confirm("Are You Sure You Want To Delete!");
if (Delete == true) {
	$.ajax({
		url:DELETEFAQAPI+"/"+id,
		type:"DELETE",
		success:function(response){
			console.log(response);
			if(response.status)
			{
				$("#alertbox").removeClass("alert-danger");
				$("#alertbox").addClass("alert-success");
				$("#alertMsg").html("FAQ Deleted Successfully");
		        $("#alertType").html("Success :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
				},5000);				
				$('#loader').show();
				ShowFaq();
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
