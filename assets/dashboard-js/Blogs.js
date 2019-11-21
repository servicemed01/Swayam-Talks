var text;
$(document).ready(function($){
 // text=$("#blogDescription").Editor();
 // console.log('text',text)
	$("#alert").hide();

	var id=Number(document.location.pathname.substr(document.location.pathname.lastIndexOf('/')+1));
		console.log(id);
		if(!isNaN(id))
		{	
			$("#submitBlog").hide();		
		    $("#updateBlog").show(); 
			UpdateData(id);
			console.log('Update Data');		     
			 EditBlog(id);
		}
		else{
			$("#updateBlog").hide(); 
			$("#submitBlog").show();
			AddBlog();
			console.log("In Add");
		    
		}
		
     showBlogs();	  
});


function showBlogs() {
	$.ajax({
		url:SELECTBLOGAPI,
		type:"GET",
		success:function(data){
			var tableData;
			data.map(function(value,index){
				//var video=value.blogVideo===0?value.blogVideoUrl;
				src=value.blogVideoUrl.length!==0?value.blogVideoUrl:value.blogVideo;
				tableData+="<tr>"+
				"<td class='center'>"+(index+1)+"</td>"+
				"<td class='center'>"+value.blogTitle+" <br><br> "+value.blogTitle_M+"</td>"+
				"<td class='center'>"+value.blogDescription+"<br><br>"+value.blogDescription_M+"</td>"+
				"<td class='center'>"+getVideoImage(value.image)+"</td>"+
				"<td class='center'>"+getVideoImage(src)+"</td>"+
				"<td class='hidden'></td>"+
				"<td class='center'><span class='green' onClick='updateBlog("+value.blogId+")'>"+
				"<i class='ace-icon fa fa-pencil bigger-130'></i></span><br>"+
				"<span class='red' onClick='deleteBlog("+value.blogId+")'>"+
				"<i class='ace-icon fa fa-trash-o bigger-130'></i></span></td>"+
				"</tr>";
			});
			$("#blogData").html(tableData);		
			tableScript();
			$('#loader').hide();
		}
	});
}
// 
function deleteBlog(id){
	$("#alert").hide();
	var Delete = confirm("Are You Sure You Want To Delete!");
if (Delete == true) {
	$.ajax({
		url:DELETEBLOGAPI+"/"+id,
		type:"DELETE",
		success:function(response){
			console.log(response);
			if(response.status)
			{
				$("#alertbox").removeClass("alert-danger");
				$("#alertbox").addClass("alert-success");
				$("#alertMsg").html("Blog data Deleted Successfully");
		        $("#alertType").html("Success :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
				},5000);
				 $('#loader').show();
				 showBlogs();
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

/* For Add Blog */
function AddBlog(){
	
	$("#alert").hide();
 	$('#submitBlog').click(function() {
 		$("#loader").show();
 		var text=$('iframe')[0].contentDocument.body.innerText;
	var htmlText=$('iframe')[0].contentDocument.body.innerHTML;
     blogTitle  = $('#blogTitle').val();
     blogTitle_M  = $('#blogTitle_M').val();
     blogDescription = htmlText;
     blogDescription_M = $('#blogDescription_M').val();
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
    formData.append(" blogTitle",blogTitle);    
    formData.append(" blogTitle_M",blogTitle_M);
    formData.append(" image", $('#image').prop('files')[0]);
    formData.append(" blogDescription",blogDescription);    
    formData.append(" blogDescription_M",blogDescription_M);
    formData.append(" blogVideo", $('#blogVideo').prop('files')[0]);
    formData.append(" blogVideoUrl",$('#blogVideoUrl').val());
    $.ajax({
    	url:INSERTBLOGAPI,
    	type:"POST",
    	data:formData,
    	processData: false, // important
        contentType: false, // important
    	success:function(response){
    		if(response.status)
			{
				$("#alertbox").removeClass("alert-danger");
				$("#alertbox").addClass("alert-success");
				$("#alertMsg").html("Blog Data Inserted Successfully");
		        $("#alertType").html("Success :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
				},5000);
				clearInputData();
				$("#loader").hide();
				scrollToTop();
				window.location.pathname=SHOWBLOGS;
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

/* Blog Edit */
function updateBlog(id){
	$("#alert").hide();
	var Blog = confirm("Are You Sure You Want To Edit!");
if (Blog == true) { 
		window.location.pathname=BLOG+"/"+id;
}
else{
	console.log(false);
}
}

var oldPhoto ;
var oldVideo;
var description;
function UpdateData(id){
	$.ajax({
		url:SELECTBLOGAPI+'/'+id, 
		type:"GET",
		success:function(data){
			console.log(data,'data');
			data.map(function(updatedata,index){
	 $('#blogTitle').val(updatedata.blogTitle);
     $('#blogTitle_M').val(updatedata.blogTitle_M);
     description=updatedata.blogDescription;
     	setTimeout(() => {
							if(description) {
							$('iframe')[0].contentDocument.body.innerHTML=description;
						}
						}, 5000);
     $('#blogDescription_M').val(updatedata.blogDescription_M); 
     $('#blogVideoUrl').val(updatedata.blogVideoUrl); 
     				oldVideo=updatedata.blogVideo;
		  		 oldPhoto = updatedata.image;
		  		  console.log("old",oldPhoto);
  
			  }); 
			}
		});
}


function EditBlog(id){
	$("#alert").hide();
	$('#updateBlog').click(function() {
		$("#loader").show();
	var htmlText=$('iframe')[0].contentDocument.body.innerHTML;
	 blogTitle  = $('#blogTitle').val();
     blogTitle_M  = $('#blogTitle_M').val();
     blogDescription = htmlText;
     blogDescription_M = $('#blogDescription_M').val();
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
                  var newVideo=$('#blogVideo').prop('files');
           		if(newVideo.length===0)
           		{
           			newVideo=oldVideo;
           			console.log("Old",newVideo);
           		}
           		else{

           			newVideo=newVideo[0];
           		}
           		console.log("new",newVideo);
    formData1.append(" blogTitle",blogTitle);    
    formData1.append(" blogTitle_M",blogTitle_M);
    formData1.append(" image", newPhoto);
    formData1.append(" blogDescription",blogDescription);
    formData1.append(" blogDescription_M",blogDescription_M);
    formData1.append(" blogVideo", newVideo);
    formData1.append(" blogVideoUrl",$('#blogVideoUrl').val());    
    formData1.append("id",id);
    $.ajax({
    	url:UPDATEBLOGAPI,
    	type:"POST",
    	data:formData1,
    	processData: false, // important
        contentType: false, // important
    	success:function(response){
    		if(response.status)
			{
				$("#alertbox").removeClass("alert-danger");
				$("#alertbox").addClass("alert-success");
				$("#alertMsg").html("Blog Data Updated Successfully");
		        $("#alertType").html("Success :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
					window.location.pathname=SHOWBLOGS;
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

function youtube_parser(url){
    var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
    var match = url.match(regExp);
    return (match&&match[7].length==11)? match[7] : false;
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
                tag='<img width="200px" height="200px" src="'+data+'" alt="">';
            break;
        default:
                tag='';
            break;
    }
    console.log('tag',tag);
    return tag;
}