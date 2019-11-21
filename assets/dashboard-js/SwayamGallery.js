 var moment=[];
 var past=[];
 var behind=[];
 var social=[];
 var press=[];
 var tableData='';
 $(document).ready(function() {
 	$("#alert").hide();
                $(".add").click(function() {
                    $('<div class="col-md-8"><br><input name="galleryImage[]" id="galleryImage" type="file"><br><span class="rem"><a href="javascript:void(0);" >Remove</span></div>').appendTo(".contents");
                });
                $('.contents').on('click', '.rem', function() {
                    $(this).parent("div").remove();
                });
                InsertGallery();
				showGallery();
            });

/* For Display Gallery */

function showGallery(){
	 var moment=[];
 var past=[];
 var behind=[];
 var social=[];
 var press=[];
	$.ajax({
		url:SELECTGALLERYAPI,
		type:"GET",
		success:function(data){
			console.log(data);
			var tableData='';
			data.map(function(value,index){
				switch(value.galleryType){
					case "Past Events":
						past.push(value);
						break;
					case "Swayam Moment":
						moment.push(value);
						break;
					case "Swayam Behind Scence":
						behind.push(value);
						break;
					case "Swayam Social":
						social.push(value);
						break;
					case "Press":
						press.push(value);
						break;
				}
			});

			setGallery(social,past,moment,behind,press);	
			
		}
	});
}


/* For Delete All Images */

 function deleteGalleryTitle(id){
	$("#alert").hide();
	var Delete = confirm("Are You Sure You Want To Delete All Images!");
if (Delete == true) {
	$.ajax({
		url:DELETEGALLERYTITLEAPI+"/"+id,
		type:"DELETE",
		success:function(response){
			console.log(response);
			if(response.status)
			{
				$("#alertbox").removeClass("alert-danger");
				$("#alertbox").addClass("alert-success");
				$("#alertMsg").html(" All Images Deleted Successfully");
		        $("#alertType").html("Success :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
					showGallery();
				},5000);
				$('#loader').show();
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


/* For Delete Single Image */

function deleteGalleryImages(id){
	$("#alert").hide();
	var Delete = confirm("Are You Sure You Want To Delete This Image!");
if (Delete == true) {
	$.ajax({
		url:DELETEGALLERYIMAGESAPI+"/"+id,
		type:"DELETE",
		success:function(response){
			console.log(response);
			if(response.status)
			{
				$("#alertbox").removeClass("alert-danger");
				$("#alertbox").addClass("alert-success");
				$("#alertMsg").html("Image Deleted Successfully");
		        $("#alertType").html("Success :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
					$("#galleryData").html('');
					showGallery();
				},5000);
				$('#loader').show();
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



 /* For Insert */
 function InsertGallery(){
 	$('#SubmitGallery').click(function() {
 	var formData=new FormData();
 	var imageList=[];
 	var imageNames=[];
    var  galleryType = $('#galleryType').val();
    var  galleryImage = $('[name="galleryImage[]"]');
	//var  galleryImageName = $('[name="galleryImageName[]"]');

	for(let i=0;i<galleryImage.length;i++){
		formData.append(" galleryImage"+i, galleryImage[i].files[0]);
		//formData.append(" galleryImageName"+i,galleryImageName[i].value);
	}
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

	//formData.append("galleryTitle",galleryTitle);
    formData.append(" galleryType",galleryType);
    formData.append("count",galleryImage.length);
    
     console.log(formData);
	$.ajax({
    	url:INSERTGALLERYAPI,
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
				$("#alertMsg").html("Gallery Inserted Successfully");
		        $("#alertType").html("Success :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
				},5000);
				clearInputData();
				$("#loader").hide();
		          scrollToTop();
				window.location.pathname=SHOWGALLERY;
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


function setGallery(social,past,moment,behind,press) {
	console.log('social',social,past,moment,behind,press);
	if(moment.length!==0){

 var tableData='';
		tableData+="<div class='filtr-container'>"+
				"<div class='panel panel-default'>"+
	"<div class='panel-heading' role='tab' id='headingOne'>"+
	"<h4 class='panel-title'>"+
	"<a role='button' data-toggle='collapse' data-parent='#accordion' href='#Swayam Moments' aria-expanded='true' aria-controls='collapseOne'>"+
	"<p style='font-size: 20px'> <strong style='font-size:15px;'>Gallery Title :</strong> Swayam Moments</p></a>"+
	"</h4></div>"+
	"<div id='Swayam Moments' class='panel-collapse collapse in' role='tabpanel' aria-labelledby='headingOne'>"+
	"<div class='panel-body'>";
		moment.map(function(image,i){
			tableData+="<div class='col-md-2 col-sm-2 filtr-item' data-category='1' data-sort='' style='margin-bottom:15px'>"+
	"<div class='agileits_portfolio_grid'>"+
	"<img class='img-responsive same-size' src='"+image.galleryImage+"' alt='"+image.galleryImageName+"'  />"+                
	"</div>"+
	"<span class='red delete-icon' onClick='deleteGalleryImages("+image.galleryImageId+")'>"+
	"<i class='ace-icon fa fa-remove'></i></span></div>"+
 	   "<div class='clerafix'></div>";
		});
	tableData+="</div><br></div>"+ 
	"</div></div>"+
	"<div class='clearfix'> </div>"+
	"</div>";

	$("#galleryData").append(tableData);
	}

	if(behind.length!==0){

 var tableData='';
		tableData+="<div class='filtr-container'>"+
				"<div class='panel panel-default'>"+
	"<div class='panel-heading' role='tab' id='headingOne'>"+
	"<h4 class='panel-title'>"+
	"<a role='button' data-toggle='collapse' data-parent='#accordion' href='#Swayam Behind Scence' aria-expanded='true' aria-controls='collapseOne'>"+
	"<p style='font-size: 20px'> <strong style='font-size:15px;'>Gallery Title :</strong> Swayam Behind Scence</p></a>"+
	"</h4></div>"+
	"<div id='Swayam Behind Scence' class='panel-collapse collapse in' role='tabpanel' aria-labelledby='headingOne'>"+
	"<div class='panel-body'>";
		behind.map(function(image,i){
			tableData+="<div class='col-md-2 col-sm-2 filtr-item' data-category='1' data-sort=''>"+
	"<div class='agileits_portfolio_grid'>"+
	"<img class='img-responsive same-size' src='"+image.galleryImage+"' alt='"+image.galleryImageName+"'  />"+                
	"</div>"+
	"<span class='red delete-icon' onClick='deleteGalleryImages("+image.galleryImageId+")'>"+
	"<i class='ace-icon fa fa-remove'></i></span></div>"+
 	   "<div class='clerafix'></div>";
		});
	tableData+="</div><br></div>"+ 
	"</div></div>"+
	"<div class='clearfix'> </div>"+
	"</div>";

	$("#galleryData").append(tableData);
	}

	if(social.length!==0){

 var tableData='';
		tableData+="<div class='filtr-container'>"+
				"<div class='panel panel-default'>"+
	"<div class='panel-heading' role='tab' id='headingOne'>"+
	"<h4 class='panel-title'>"+
	"<a role='button' data-toggle='collapse' data-parent='#accordion' href='#Swayam Social' aria-expanded='true' aria-controls='collapseOne'>"+
	"<p style='font-size: 20px'> <strong style='font-size:15px;'>Gallery Title :</strong> Swayam Social</p></a>"+
	"</h4></div>"+
	"<div id='Swayam Social' class='panel-collapse collapse in' role='tabpanel' aria-labelledby='headingOne'>"+
	"<div class='panel-body'>";
		social.map(function(image,i){
			tableData+="<div class='col-md-2 col-sm-2 filtr-item' data-category='1' data-sort=''>"+
	"<div class='agileits_portfolio_grid'>"+
	"<img class='img-responsive same-size' src='"+image.galleryImage+"' alt='"+image.galleryImageName+"'  />"+                
	"</div>"+
	"<span class='red delete-icon' onClick='deleteGalleryImages("+image.galleryImageId+")'>"+
	"<i class='ace-icon fa fa-remove'></i></span></div>"+
 	   "<div class='clerafix'></div>";
		});
	tableData+="</div><br></div>"+ 
	"</div></div>"+
	"<div class='clearfix'> </div>"+
	"</div>";

	$("#galleryData").append(tableData);
	}


	if(past.length!==0){

 var tableData='';
		tableData+="<div class='filtr-container'>"+
				"<div class='panel panel-default'>"+
	"<div class='panel-heading' role='tab' id='headingOne'>"+
	"<h4 class='panel-title'>"+
	"<a role='button' data-toggle='collapse' data-parent='#accordion' href='#Past Events' aria-expanded='true' aria-controls='collapseOne'>"+
	"<p style='font-size: 20px'> <strong style='font-size:15px;'>Gallery Title :</strong> Past Events</p></a>"+
	"</h4></div>"+
	"<div id='Past Events' class='panel-collapse collapse in' role='tabpanel' aria-labelledby='headingOne'>"+
	"<div class='panel-body'>";
		past.map(function(image,i){
			tableData+="<div class='col-md-2 col-sm-2 filtr-item' data-category='1' data-sort=''>"+
	"<div class='agileits_portfolio_grid'>"+
	"<img class='img-responsive same-size' src='"+image.galleryImage+"' alt='"+image.galleryImageName+"'  />"+                
	"</div>"+
	"<span class='red delete-icon' onClick='deleteGalleryImages("+image.galleryImageId+")'>"+
	"<i class='ace-icon fa fa-remove'></i></span></div>"+
 	   "<div class='clerafix'></div>";
		});
	tableData+="</div><br></div>"+ 
	"</div></div>"+
	"<div class='clearfix'> </div>"+
	"</div>";

	$("#galleryData").append(tableData);
	}


	if(press.length!==0){

 var tableData='';
		tableData+="<div class='filtr-container'>"+
				"<div class='panel panel-default'>"+
	"<div class='panel-heading' role='tab' id='headingOne'>"+
	"<h4 class='panel-title'>"+
	"<a role='button' data-toggle='collapse' data-parent='#accordion' href='#Press' aria-expanded='true' aria-controls='collapseOne'>"+
	"<p style='font-size: 20px'> <strong style='font-size:15px;'>Gallery Title :</strong> Press</p></a>"+
	"</h4></div>"+
	"<div id='Press' class='panel-collapse collapse in' role='tabpanel' aria-labelledby='headingOne'>"+
	"<div class='panel-body'>";
		press.map(function(image,i){
			tableData+="<div class='col-md-2 col-sm-2 filtr-item' data-category='1' data-sort=''>"+
	"<div class='agileits_portfolio_grid'>"+
	"<img class='img-responsive same-size' src='"+image.galleryImage+"' alt='"+image.galleryImageName+"'  />"+                
	"</div>"+
	"<span class='red delete-icon' onClick='deleteGalleryImages("+image.galleryImageId+")'>"+
	"<i class='ace-icon fa fa-remove'></i></span></div>"+
 	   "<div class='clerafix'></div>";
		});
	tableData+="</div><br></div>"+ 
	"</div></div>"+
	"<div class='clearfix'> </div>"+
	"</div>";

	$("#galleryData").append(tableData);
	}
	$('#loader').hide();
}