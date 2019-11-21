$(document).ready(function(){
	//alert('aaa');
	window.addEventListener("keyup",loginOnEnter)
});
$(window).unload(function(){
	window.removeEventListener("keyup",loginOnEnter)
})
function loginOnEnter(e){
	e.keyCode === 13 && login()
}

function validate(name,pass) {
	var status=false;
	if(name!="" && pass!=""){
		status=true;
	}
	else if(name==""){
		status=false;
		$("#username").focus();
	}
	else{
		status=false;
		$("#password").focus();
	}
	return status;
}

function login() {
var name=$('#username').val();
var password=$('#password').val();
if(validate(name,password)){
var loginData={name,password};
$.ajax({
	url:LOGINAPI,
	type:"POST",
	data:loginData,
	success:function(response) {
		console.log(response);
		if(response.loginStatus){
			//setCookie("adminId",response.adminId,1);
			//setCookie("adminName",response.name,1);
			
			window.location.pathname=HOME;
		}
		else{
			alert('Invalid credentials');
		}
	}
});
}
else{
alert('please enter Valid credentials');
}
}
function bake_cookie(name, value) {
  var cookie = [name, '=', JSON.stringify(value), '; domain=.', window.location.host.toString(), '; path=/;'].join('');
  document.cookie = cookie;
}

//remember me functionality. 
$(function() {

    if (localStorage.chkbx && localStorage.chkbx != '') {
        $('#remember').attr('checked', 'checked');
        $('#username').val(localStorage.username);
        $('#password').val(localStorage.password);
    } else {
        $('#remember').removeAttr('checked');
        $('#username').val('');
        $('#password').val('');
    }

    $('#remember').click(function() {

        if ($('#remember').is(':checked')) {
            // save username and password
            localStorage.username = $('#username').val();
            localStorage.password = $('#password').val();
            localStorage.chkbx = $('#remember').val();
        } else {
            localStorage.username = '';
            localStorage.password = '';
            localStorage.chkbx = '';
        }
    });
});