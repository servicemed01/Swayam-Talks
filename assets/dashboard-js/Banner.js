
var videos;
$(document).ready(function(){
	$("#alert").hide();	
	$("#submitBanner").click(function(){
		if(validateForm()){
	
		$("#alertbox").removeClass("alert-success");
		$("#alertbox").addClass("alert-danger");
		$("#alertMsg").html("Enter All Fields");
		$("#alertType").html("Error :");
		$("#alert").show();
		setTimeout(function(){
				$("#alert").hide();
				},5000);
		$('#loader').hide();
	
	}
	else
	{	
	var formData=new FormData();	
    formData.append(" bannerPhoto", $('#bannerPhoto').prop('files')[0]);
    formData.append(" bannerType",$('#bannerType').val());
    formData.append(" videoId",$('#videoId').val());
    $.ajax({
    	url:INSERTBANNERAPI,
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
				$("#alertMsg").html("Banner Photo Inserted Successfully");
		        $("#alertType").html("Success :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
				},5000);
				clearInputData();
				$('#loader').show();
				showBanner();
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

	$('#bannerType').change(function(e){
		var key=e.target.selectedIndex===1?"Swayam Talks":"Swayam Stories";
		setSelectVideo(videos,key)
	})
	showBanner();
});


function showBanner() {
	$("#alert").hide();
	$.ajax({
		url:SELECTBANNERAPI,
		type:"GET",
		success:function(data){
			console.log(data)
			var tableData;
			data.map(function(value,index){
				tableData+="<tr><td class='center'>"+(index+1)+"</td>"+
				"<td class='center'>"+value.bannerType+"</td>"+
				"<td class='center'><img src='"+value.bannerPhoto+"' style='width:100%;height:170px'></td>"+				
				"<td class='hidden'></td>"+
				"<td class='hidden'></td>"+
				"<td class='hidden'></td>"+
				"<td class='center'><span class='red' onClick='deleteBanner("+value.bannerId+")'>"+
				"<i class='ace-icon fa fa-trash-o bigger-130'></i></span></td>"+				
				"</tr>";
			});
			$("#bannerData").html(tableData);		
			tableScript();	
			$('#loader').hide();
		}
	});
}

function deleteBanner(id){
	$("#alert").hide();
	var Delete = confirm("Are You Sure You Want To Delete!");
if (Delete == true) {
	$.ajax({
		url:DELETEBANNERAPI+"/"+id,
		type:"DELETE",
		success:function(response){
			console.log(response);
			if(response.status)
			{
				$("#alertbox").removeClass("alert-danger");
				$("#alertbox").addClass("alert-success");
				$("#alertMsg").html("Banner Deleted Successfully");
		        $("#alertType").html("Success :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
				},5000);
				$('#loader').show();
				showBanner();
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

/* For Video */
	$.ajax({
		url:SELECTVIDEOAPI,
		type:"GET",
		success:function(response){
			videos=response;
			 $('#loader').hide(); 
		}
	});

function setSelectVideo(response,key) {
	var option="<option> Select Video </option>";
			response.map(function(value,index){
				if(key===value.videoType){
option+="<option value="+value.videoId+">"+value.videoName_M+" : "+value.videoType+"</option>";
				}
	                         
			});
			$("#videoId").html(option);
}