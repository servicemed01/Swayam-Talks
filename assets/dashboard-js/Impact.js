
$(document).ready(function(){
	$("#alert").hide();

	var id=Number(document.location.pathname.substr(document.location.pathname.lastIndexOf('/')+1));
		console.log(id);
		if(!isNaN(id))
		{	
			$("#submitImpact").hide();		
		    $("#updateImpact").show(); 
			UpdateData(id);
			console.log('Update Data');		    
			 EditImpact(id);
		}
		else{
			$("#updateImpact").hide(); 
			$("#submitImpact").show();
			AddImpact();
			console.log("In Add");
		    
		}
		
     showImpacts();	  
});

function showImpacts() {
	$.ajax({
		url:SELECTIMPACTAPI,
		type:"GET",
		success:function(data){
			var tableData;
			data.map(function(value,index){
				src=value.impactVideoUrl.length!==0?value.impactVideoUrl:value.impactVideo;
				tableData+="<tr>"+
				"<td class='center'>"+(index+1)+"</td>"+
				"<td class='center'>"+value.impactTitle+" <br><br> "+value.impactTitle_M+"</td>"+
				"<td class='center'>"+value.impactDescription+"<br><br>"+value.impactDescription_M+"</td>"+
				"<td class='center'>"+getVideoImage(value.image)+"</td>"+
				"<td class='center'>"+getVideoImage(src)+"</td>"+
				"<td class='hidden'></td>"+
				"<td class='center'><span class='green' onClick='updateImpact("+value.impactId+")'>"+
				"<i class='ace-icon fa fa-pencil bigger-130'></i></span><br>"+
				"<span class='red' onClick='deleteImpact("+value.impactId+")'>"+
				"<i class='ace-icon fa fa-trash-o bigger-130'></i></span></td>"+
				"</tr>";
			});
			$("#impactData").html(tableData);		
			tableScript();
			$('#loader').hide();
		}
	});
}

function youtube_parser(url){
    var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
    var match = url.match(regExp);
    return (match&&match[7].length==11)? match[7] : false;
}


function deleteImpact(id){
	$("#alert").hide();
	var Delete = confirm("Are You Sure You Want To Delete !");
if (Delete == true) {
	$.ajax({
		url:DELETEIMPACTAPI+"/"+id,
		type:"DELETE",
		success:function(response){
			console.log(response);
			if(response.status)
			{
				$("#alertbox").removeClass("alert-danger");
				$("#alertbox").addClass("alert-success");
				$("#alertMsg").html("Impact data Deleted Successfully");
		        $("#alertType").html("Success :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
				},5000);
				 $('#loader').show();
				 showImpacts();
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

/* For Add Impact */
function AddImpact(){
	$("#alert").hide();
 	$('#submitImpact').click(function() {
 		$("#loader").show();
     impactTitle  = $('#impactTitle').val();
     impactTitle_M  = $('#impactTitle_M').val();
     impactDescription = $('#impactDescription').val();
     impactDescription_M = $('#impactDescription_M').val();
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
    formData.append(" impactTitle",impactTitle);    
    formData.append(" impactTitle_M",impactTitle_M);
    formData.append(" image", $('#image').prop('files')[0]);
    formData.append(" impactDescription",impactDescription);
    formData.append(" impactDescription_M",impactDescription_M);
    formData.append(" impactVideo", $('#impactVideo').prop('files')[0]);
    formData.append(" impactVideoUrl",$('#impactVideoUrl').val());
    $.ajax({
    	url:INSERTIMPACTAPI,
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
				$("#alertMsg").html("Impact Data Inserted Successfully");
		        $("#alertType").html("Success :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
				},5000);
				clearInputData();
				$("#loader").hide();
				scrollToTop();
				window.location.pathname=SHOWIMPACTS;
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

/* Impact Edit */
function updateImpact(id){
	$("#alert").hide();
	var Impact = confirm("Are You Sure You Want To Edit!");
if (Impact == true) { 
		window.location.pathname=IMPACT+"/"+id;
}
else{
	console.log(false);
}
}

var oldPhoto ;
var oldVideo;
function UpdateData(id){
	$.ajax({
		url:SELECTIMPACTAPI+'/'+id, 
		type:"GET",
		success:function(data){
			console.log(data,'data');
			data.map(function(updatedata,index){

	 $('#impactTitle').val(updatedata.impactTitle);
     $('#impactTitle_M').val(updatedata.impactTitle_M);
     $('#impactDescription').val(updatedata.impactDescription);
     $('#impactDescription_M').val(updatedata.impactDescription_M); 
	// $('#impactVideo').val(updatedata.impactVideo); 
	 $('#impactVideoUrl').val(updatedata.impactVideoUrl); 
	 			oldVideo=updatedata.impactVideo;
	 				console.log(oldVideo); 
		  		 oldPhoto = updatedata.image;
		  		  console.log("old",oldPhoto);
  
			  }); 
			}
		});
}


function EditImpact(id){
	$("#alert").hide();
	$('#updateImpact').click(function() {
		$("#loader").show();
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
	 impactTitle  = $('#impactTitle').val();
     impactTitle_M  = $('#impactTitle_M').val();
     impactDescription = $('#impactDescription').val();
     impactDescription_M = $('#impactDescription_M').val();
     var formData1=new FormData();
     var newPhoto=$('#image').prop('files');
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

           var newVideo=$('#impactVideo').prop('files');
           		if(newVideo.length===0)
           		{
           			newVideo=oldVideo;
           			console.log("Old",newVideo);
           		}
           		else{

           			newVideo=newVideo[0];
           		}
           		console.log("new",newVideo);
    formData1.append(" impactTitle",impactTitle);    
    formData1.append(" impactTitle_M",impactTitle_M);
    formData1.append(" image", newPhoto);
    formData1.append(" impactDescription",impactDescription);
    formData1.append(" impactDescription_M",impactDescription_M);
    formData1.append(" impactVideo",newVideo);
    formData1.append(" impactVideoUrl",$('#impactVideoUrl').val());    
    formData1.append("id",id);
    $.ajax({
    	url:UPDATEIMPACTAPI,
    	type:"POST",
    	data:formData1,
    	processData: false, // important
        contentType: false, // important
    	success:function(response){
    		if(response.status)
			{
				$("#alertbox").removeClass("alert-danger");
				$("#alertbox").addClass("alert-success");
				$("#alertMsg").html("Impact Data Updated Successfully");
		        $("#alertType").html("Success :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
					window.location.pathname=SHOWIMPACTS;
				},5000);
				clearInputData();
				$("#loader").hide();
				scrollToTop();				
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


function getVideoImage(data) {
    var type=data.includes('youtube')?'youtube':data.includes('.mp4')?'video':'img';
    var tag='';
     switch(type){
        case 'youtube':
                tag='<iframe style="width: 100%;height: 300px;max-width: 600px;" src="https://www.youtube.com/embed/' + youtube_parser(data) + '?controls=1" allowfullscreen></iframe>';
            break;
        case 'video':
                tag='<video height="240" style="width: 320px;" controls> <source src="'+data+'" type="video/mp4"></video>'
            break;
        case 'img':
                tag='<img width="200px" height="160px" src="'+data+'" alt="">';
            break;
        default:
                tag='';
            break;
    }

    return tag;
}
