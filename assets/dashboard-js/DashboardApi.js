

var DOMAIN="http://localhost/Swayam-Talks";

/* Login Api */
var LOGINAPI=DOMAIN+"/Api/Login/Login";

/* DISPLAY API */

// SELECT CATEGORY
var SELECTCATEGORYAPI=DOMAIN+"/Api/Category/SelectCategory";

// SELECT LOCATION 
var SELECTLOCATIONAPI=DOMAIN+"/Api/Location/SelectLocation";

// SELECT SPEAKER
var SELECTSPEAKERAPI=DOMAIN+"/Api/Speaker/SelectSpeaker";

// SELECT VIDEO
var SELECTVIDEOAPI=DOMAIN+"/Api/Video/SelectVideo";

// SELECT STORY
var SELECTSTORYAPI=DOMAIN+"/Api/Video/StoriesVideo";

// SELECT TALKS
var SELECTTALKSAPI=DOMAIN+"/Api/Video/TalksVideo";

// SELECT USERS
var SELECTUSERSAPI=DOMAIN+"/Api/User/SelectUser";

// SELECT EVENT
var SELECTEVENTAPI=DOMAIN+"/Api/Event/SelectEvent";

// SELECT FEEDBACK
var SELECTFEEDBACKAPI=DOMAIN+"/Api/Feedback/SelectFeedback";	

// SELECT FAQ
var SELECTFAQAPI=DOMAIN+"/Api/Faq/SelectFaq";	

// SELECT BANNER
var SELECTBANNERAPI=DOMAIN+"/Api/Banner/SelectBanner";

// SELECT SPONSER
var SELECTSPONSERAPI=DOMAIN+"/Api/Sponser/SelectSponser";

// SELECT CONTACT
var SELECTCONTACTAPI=DOMAIN+"/Api/Contact/SelectContact";

// SELECT GALLERY
var SELECTGALLERYAPI=DOMAIN+"/Api/SwayamGallery/SelectSwayamGallery";

// SELECT MostVisitedCategory
var SELECTMOSTVISITEDCATEGORYAPI=DOMAIN+"/Api/Video/MostVisited";

// SELECT IMPACT
var SELECTIMPACTAPI=DOMAIN+"/Api/Impact/SelectImpact";

// SELECT BLOG
var SELECTBLOGAPI=DOMAIN+"/Api/Blogs/SelectBlogs";


//SHOW SPONSER 
 var SHOWSPONSERJOIN = DOMAIN + "Api/Joinus/SelectSponsersJoinus";

//SHOW ORGANIZER 
 var SHOWORGANIZERJOIN = DOMAIN + "Api/Joinus/SelectOrganizerJoinus";

 //SHOW AUDIANCE 
 var SHOWAUDIANCEJOIN = DOMAIN + "Api/Joinus/SelectAudianceJoinus";

 //SHOW SPEAKER 
 var SHOWSPEAKERJOIN = DOMAIN + "Api/Joinus/SelectSpeakerJoinus";


/* INSERT API */

// INSERT CATEGORY
var INSERTCATEGORYAPI=DOMAIN+"/Api/Category/AddCategory";

// INSERT LOCATION 
var INSERTLOCATIONAPI=DOMAIN+"/Api/Location/AddLocation";

// INSERT SPEAKER
var INSERTSPEAKERAPI=DOMAIN+"/Api/Speaker/AddSpeaker";

// INSERT VIDEO
var INSERTVIDEOAPI=DOMAIN+"/Api/Video/AddVideo";

// INSERT USERS
var INSERTUSERSAPI=DOMAIN+"/Api/User/AddUser";

// INSERT EVENT
var INSERTEVENTAPI=DOMAIN+"/Api/Event/AddEvent";

// INSERT FEEDBACK
var INSERTFEEDBACKAPI=DOMAIN+"/Api/Feedback/AddFeedback";	

// INSERT FAQ
var INSERTFAQAPI=DOMAIN+"/Api/Faq/AddFaq";	

// INSERT BANNER
var INSERTBANNERAPI=DOMAIN+"/Api/Banner/AddBanner";

// INSERT SPONSER
var INSERTSPONSERAPI=DOMAIN+"/Api/Sponser/AddSponser";

// INSERT CONTACT
var INSERTCONTACTAPI=DOMAIN+"/Api/Contact/AddContact";

// INSERT GALLERY
var INSERTGALLERYAPI=DOMAIN+"/Api/SwayamGallery/AddSwayamGallery";

// INSERT IMPACT
var INSERTIMPACTAPI=DOMAIN+"/Api/Impact/AddImpact";

// INSERT BLOG
var INSERTBLOGAPI=DOMAIN+"/Api/Blogs/AddBlogs";


/* DELETE API */

// DELETE CATEGORY
var DELETECATEGORYAPI=DOMAIN+"/Api/Category/DeleteCategory";

// DELETE LOCATION 
var DELETELOCATIONAPI=DOMAIN+"/Api/Location/DeleteLocation";

// DELETE SPEAKER
var DELETESPEAKERAPI=DOMAIN+"/Api/Speaker/DeleteSpeaker";

// DELETE VIDEO
var DELETEVIDEOAPI=DOMAIN+"/Api/Video/DeleteVideo";

// DELETE USERS
var DELETEUSERSAPI=DOMAIN+"/Api/User/DeleteUser";

// DELETE EVENT
var DELETEEVENTAPI=DOMAIN+"/Api/Event/DeleteEvent";

// DELETE FEEDBACK
var DELETEFEEDBACKAPI=DOMAIN+"/Api/Feedback/DeleteFeedback";	

// DELETE FAQ
var DELETEFAQAPI=DOMAIN+"/Api/Faq/DeleteFaq";	

// DELETE BANNER
var DELETEBANNERAPI=DOMAIN+"/Api/Banner/DeleteBanner";

// DELETE SPONSER
var DELETESPONSERAPI=DOMAIN+"/Api/Sponser/DeleteSponser";

// DELETE CONTACT
var DELETECONTACTAPI=DOMAIN+"/Api/Contact/DeleteContact";

// DELETE GALLERY TITLE
var DELETEGALLERYTITLEAPI=DOMAIN+"/Api/SwayamGallery/DeleteSwayamGalleryTitle";

// DELETE GALLERY IMAGES
var DELETEGALLERYIMAGESAPI=DOMAIN+"/Api/SwayamGallery/DeleteSwayamGalleryImages";

// DELETE IMPACT
var DELETEIMPACTAPI=DOMAIN+"/Api/Impact/DeleteImpact";

// DELETE BLOG
var DELETEBLOGAPI=DOMAIN+"/Api/Blogs/DeleteBlogs";


/* EDIT API */

// UPDATE VIDEO
var UPDATEVIDEOAPI=DOMAIN+"/Api/Video/UpdateVideo";

// UPDATE SPEAKER
var UPDATESPEAKERAPI=DOMAIN+"/Api/Speaker/UpdateSpeaker";

// UPDATE USERS
var UPDATEUSERSAPI=DOMAIN+"/Api/User/UpdateUser";

// UPDATE EVENT
var UPDATEEVENTAPI=DOMAIN+"/Api/Event/UpdateEvent";

// UPDATE IMPACT
var UPDATEIMPACTAPI=DOMAIN+"/Api/Impact/UpdateImpact";

// UPDATE BLOG
var UPDATEBLOGAPI=DOMAIN+"/Api/Blogs/UpdateBlogs";

// UPDATE CATEGORY
var UPDATECATEGORYAPI=DOMAIN+"/Api/Category/UpdateCategory";

// UPDATE LOCATION
var UPDATELOCATIONAPI=DOMAIN+"/Api/Location/UpdateLocation";

// UPDATE SPONSER
var UPDATESPONSERAPI=DOMAIN+"/Api/Sponser/UpdateSponser";



var isShowPage=window.location.pathname.includes("Show");

/* To Clear Input Field Data*/
 
function clearInputData() {
  $(':input').each(function() {
    var type = this.type;
    var tag = this.tagName.toLowerCase(); 
    if (type == 'text' || type == 'password' || tag == 'textarea' || type == 'file'  || type == 'url' || type =='number' || type=='date' || type=='email')
      this.value = "";
    else if (type == 'checkbox' || type == 'radio')
      this.checked = false;
    else if (tag == 'select')
      this.selectedIndex = 0;
  });
};  

function youtube_parser(url){
    var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
    var match = url.match(regExp);
    return (match&&match[7].length==11)? match[7] : false;
}


$('.sepcialChar').bind('keyup blur',function(){ 
    $(this).val( $(this).val().replace( /^[ A-Za-z0-9_@./#&+-]*$/,''));
  });

function scrollToTop() { 
            window.scrollTo(0, 0); 
        } 
        
function validateForm() {
  var nodeList=$('.validation');
  var flag=false;
  nodeList.each(function(index,node){
    if($(node).val()=="" && !flag) {
       node.focus(); flag=!flag
    }
  });
  return flag;
}

// || $(node).val()=="-1" || $(node).val()==null