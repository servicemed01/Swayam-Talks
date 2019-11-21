




$(document).ready(function(){
	$("#alert").hide();
	
	var id=Number(document.location.pathname.substr(document.location.pathname.lastIndexOf('/')+1));
		console.log(id);
		if(!isNaN(id))
		{	
			$("#SubmitCat").hide();		
		    $("#updateCat").show(); 
			UpdateData(id);
			console.log('Update Data');		    
			 EditCat(id);
		}
		else{
			$("#updateCat").hide(); 
			$("#SubmitCat").show();
			AddCat();
			console.log("In Add");
		    
		}
		showCategory();

});

function showCategory() {
	$.ajax({
		url:SELECTCATEGORYAPI,
		type:"GET",
		success:function(data){
			console.log(data)
			var tableData;
			data.map(function(value,index){
				tableData+="<tr>"+
				"<td class='center'>"+(index+1)+"</td>"+
				"<td class='center'>"+value.categoryName+"/"+value.categoryName_M+"</td>"+
				"<td class='hidden'></td>"+
				"<td class='hidden'></td>"+
				"<td class='hidden'></td>"+
				"<td class='hidden'></td>"+
				"<td class='center'><span class='green' onClick='updateCat("+value.categoryId+")'>"+
				"<i class='ace-icon fa fa-pencil bigger-130'></i></span><br>"+
				"<span class='red' onClick='deleteCategory("+value.categoryId+")'>"+
				"<i class='ace-icon fa fa-trash-o bigger-130'></i></span></td>"+				
				"</tr>";
			});
			$("#categoryData").html(tableData);		
			tableScript();	
			$('#loader').hide();
		}
	});
}


function deleteCategory(id){
	$("#alert").hide();
	var Delete = confirm("If you delete this category the other data releted to this category will also be deleted.Are You Sure You Want To Delete!");
if (Delete == true) {
	$.ajax({
		url:DELETECATEGORYAPI+"/"+id,
		type:"DELETE",
		success:function(response){
			console.log(response);
			if(response.status)
			{
				$("#alertbox").removeClass("alert-danger");
				$("#alertbox").addClass("alert-success");
				$("#alertMsg").html("Category Name Deleted Successfully");
		        $("#alertType").html("Success :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
				},5000);
				$('#loader').show();
				showCategory();
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
else
{
	console.log(false);
}
}


function AddCat(){
	$("#SubmitCat").click(function(){
	var categoryName = $("#categoryName").val();
	var categoryName_M = $("#categoryName_M").val();
	if(categoryName.includes("<script>") || validateForm())
	{
		$("#alertbox").removeClass("alert-success");
		$("#alertbox").addClass("alert-danger");
		$("#alertMsg").html("Enter Category Name");
		$("#alertType").html("Error :");
		$("#alert").show();
		setTimeout(function(){
					$("#alert").hide();
				},5000);
	}
	else
	{	
	$.ajax({
		url:INSERTCATEGORYAPI,
		type:"POST",
		data:{categoryName,categoryName_M},
		success:function(response){
			console.log(response);
			if(response.status)
			{
				$("#alertbox").removeClass("alert-danger");
				$("#alertbox").addClass("alert-success");
				$("#alertMsg").html("Category Name Inserted Successfully");
		        $("#alertType").html("Success :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
				},5000);
				clearInputData();
				$('#loader').show();
				showCategory();
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

/* Cat Edit */
function updateCat(id){
	$("#alert").hide();
	var Cat = confirm("Are You Sure You Want To Edit!");
if (Cat == true) { 
		window.location.pathname=CATEGORY+"/"+id;
}
else{
	console.log(false);
}
}

function UpdateData(id){
	$.ajax({
		url:SELECTCATEGORYAPI+'/'+id, 
		type:"GET",
		success:function(data){
			console.log(data,'data');
			data.map(function(updatedata,index){

	 $('#categoryName').val(updatedata.categoryName);
     $('#categoryName_M').val(updatedata.categoryName_M);
    
			  }); 
			}
		});
}

function EditCat(id){
	$("#updateCat").click(function(){
	var categoryName = $("#categoryName").val();
	var categoryName_M = $("#categoryName_M").val();
	if(categoryName.includes("<script>") || validateForm())
	{
		$("#alertbox").removeClass("alert-success");
		$("#alertbox").addClass("alert-danger");
		$("#alertMsg").html("Enter Category Name");
		$("#alertType").html("Error :");
		$("#alert").show();
		setTimeout(function(){
					$("#alert").hide();
				},5000);
	}
	else
	{	
	$.ajax({
		url:UPDATECATEGORYAPI,
		type:"POST",
		data:{categoryName,categoryName_M,id},
		success:function(response){
			console.log(response);
			if(response.status)
			{
				$("#alertbox").removeClass("alert-danger");
				$("#alertbox").addClass("alert-success");
				$("#alertMsg").html("Category Name Updated Successfully");
		        $("#alertType").html("Success :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
				},5000);
				clearInputData();
				$('#loader').show();
				$("#updateCat").hide(); 
			     $("#SubmitCat").show();
				window.location.pathname=CATEGORY;
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