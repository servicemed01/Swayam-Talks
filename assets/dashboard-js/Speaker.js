
$(document).ready(function() {
	$("#alert").hide();
			var id=Number(document.location.pathname.substr(document.location.pathname.lastIndexOf('/')+1));
		console.log(id);
		if(!isNaN(id))
		{	
			$("#submitSpeaker").hide();		
		    $("#updateSpeaker").show(); 
			UpdateData(id);
			console.log('Update Data');		    
			 EditSpeaker(id);
		}
		else{
			$("#updateSpeaker").hide(); 
			$("#submitSpeaker").show();
			AddSpeaker();
			console.log("In Add");
		    
		}

		showSpeaker();
	});

 function showSpeaker(){
 	$("#alert").hide();
	$.ajax({
		url:SELECTSPEAKERAPI,
		type:"GET",
		success:function(data){
			console.log(data)
			var tableData;
			data.map(function(value,index){
				tableData+="<tr>"+
				"<td class='center'>"+(index+1)+"</td>"+
				"<td class='center'>"+value.name+" / "+value.name_M+"</td>"+
				"<td class='center'><img src='"+value.profile+"' class='img-responsive'  width='200px' height='170px'></td>"+
				"<td class='center'>"+value.about+" <br>  "+value.about_M+"</td>"+
				"<td class='center'>"+value.website+"</td>"+
				"<td class='center'>Email ID : "+value.email+" <br> Contact: "+value.mobile+" <br> DOB : "+value.dob+" <br>  Awards: "+value.awards+"</td>"+
				"<td class='center'><span class='green' onClick='updateSpeaker("+value.speakerId+")'>"+
				"<i class='ace-icon fa fa-pencil bigger-130'></i></span><br>"+
				"<span class='red' onClick='deleteSpeaker("+value.speakerId+")'>"+
				"<i class='ace-icon fa fa-trash-o bigger-130'></i></span>"+
				"</tr>";
				
			});
			$("#speakerData").html(tableData);		
			tableScript();	
			$('#loader').hide();
		}
	});
}


function deleteSpeaker(id){
	$("#alert").hide();
	var Delete = confirm("If you delete this speaker the other data releted to this speaker will also be deleted.Are You Sure You Want To Delete!");
if (Delete == true) {
	$.ajax({
		url:DELETESPEAKERAPI+"/"+id,
		type:"DELETE",
		success:function(response){
			console.log(response);
			if(response.status)
			{
				$("#alertbox").removeClass("alert-danger");
				$("#alertbox").addClass("alert-success");
				$("#alertMsg").html("Speaker Deleted Successfully");
		        $("#alertType").html("Success :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
				},5000);
				$('#loader').show();
				showSpeaker();
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

function AddSpeaker(){
	$('#submitSpeaker').click(function() {
				$("#loader").show();
			name       =   $('#name').val();
			name_M     =   $('#name_M').val();
	        mobile     =   $('#mobile').val();
            email      =   $('#email').val();  
            dob        =   $('#dob').val();
            website    =   $('#website').val();
		    awards     =   $('#awards').val();
		    referance1 =   $('#referance1').val();
		    referance2 =   $('#referance2').val();
		    about  	   =   $('#about').val();
		    about_M    =   $('#about_M').val();
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
	formData.append("name",name);
	formData.append("name_M",name_M);
	formData.append("about_M",about_M);
	formData.append("mobile",mobile);
    formData.append("email",email);  
    formData.append("dob",dob);
    formData.append("website",website);
    formData.append("awards",awards);
    formData.append("referance1",referance1);
    formData.append("referance2",referance2);
    formData.append("about",about);
    formData.append("profile", $('#profile').prop('files')[0]);
      console.log(formData);
    $.ajax({
    	url:INSERTSPEAKERAPI,
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
				$("#alertMsg").html("Speaker Data Inserted Successfully");
		        $("#alertType").html("Success :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
				},5000);
				clearInputData();
				$("#loader").hide();
		          scrollToTop();
		          window.location.pathname=SHOWSPEAKERS;
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

/* Speaker Events */
function updateSpeaker(id){
	$("#alert").hide();
	var Speaker = confirm("Are You Sure You Want To Edit Speaker!");
if (Speaker == true) { 
		window.location.pathname=SPEAKERS+"/"+id;
}
else{
	console.log(false);
}
}

var oldPhoto ;
function UpdateData(id){
	$.ajax({
		url:SELECTSPEAKERAPI+'/'+id, 
		type:"GET",
		success:function(data){
			console.log(data,'data');
			data.map(function(updatedata,index){

				$('#name').val(updatedata.name);
				$('#name_M').val(updatedata.name_M);
				$('#mobile').val(updatedata.mobile);
				$('#email').val(updatedata.email); 
				$('#dob').val(updatedata.dob);
				$('#website').val(updatedata.website);
				$('#awards').val(updatedata.awards);
				$('#referance1').val(updatedata.referance1);
				$('#referance2').val(updatedata.referance2);
				$('#about').val(updatedata.about);
				$('#about_M').val(updatedata.about_M);
		  		 oldPhoto = updatedata.profile;
		  		  console.log("old",oldPhoto);
  
			  }); 
			}
		});
}

function EditSpeaker(id){
	$("#loader").show();
	$('#updateSpeaker').click(function() {
		    name       =   $('#name').val();
			name_M     =   $('#name_M').val();
	        mobile     =   $('#mobile').val();
            email      =   $('#email').val();  
            dob        =   $('#dob').val();
            website    =   $('#website').val();
		    awards     =   $('#awards').val();
		    referance1 =   $('#referance1').val();
		    referance2 =   $('#referance2').val();
		    about  	   =   $('#about').val();
		    about_M    =   $('#about_M').val();
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

		var newPhoto=$('#profile').prop('files');
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
	formData1.append("name",name);
	formData1.append("name_M",name_M);
	formData1.append("about_M",about_M);
	formData1.append("mobile",mobile);
    formData1.append("email",email);  
    formData1.append("dob",dob);
    formData1.append("website",website);
    formData1.append("awards",awards);
    formData1.append("referance1",referance1);
    formData1.append("referance2",referance2);
    formData1.append("about",about);
    formData1.append("profile", newPhoto);
    formData1.append("id",id);
      console.log(formData1);
    $.ajax({
    	url:UPDATESPEAKERAPI,
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
				$("#alertMsg").html("Speaker Data Updated Successfully");
		        $("#alertType").html("Success :");
				$("#alert").show();
				setTimeout(function(){
					$("#alert").hide();
				},5000);
				clearInputData();
				$("#loader").hide();
		         scrollToTop();
				window.location.pathname=SHOWSPEAKERS;
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