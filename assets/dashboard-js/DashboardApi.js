

var DOMAIN="http://localhost/";

/* Login Api */
var LOGINAPI=DOMAIN+"swayamtalk/Api/Login/Login";

/* DISPLAY API */

// SELECT CATEGORY
var SELECTCATEGORYAPI=DOMAIN+"swayamtalk/Api/Category/SelectCategory";

// SELECT LOCATION 
var SELECTLOCATIONAPI=DOMAIN+"swayamtalk/Api/Location/SelectLocation";

// SELECT SPEAKER
var SELECTSPEAKERAPI=DOMAIN+"swayamtalk/Api/Speaker/SelectSpeaker";

// SELECT VIDEO
var SELECTVIDEOAPI=DOMAIN+"swayamtalk/Api/Video/SelectVideo";

// SELECT STORY
var SELECTSTORYAPI=DOMAIN+"swayamtalk/Api/Video/StoriesVideo";

// SELECT TALKS
var SELECTTALKSAPI=DOMAIN+"swayamtalk/Api/Video/TalksVideo";

// SELECT USERS
var SELECTUSERSAPI=DOMAIN+"swayamtalk/Api/User/SelectUser";

// SELECT EVENT
var SELECTEVENTAPI=DOMAIN+"swayamtalk/Api/Event/SelectEvent";

// SELECT FEEDBACK
var SELECTFEEDBACKAPI=DOMAIN+"swayamtalk/Api/Feedback/SelectFeedback";	

// SELECT FAQ
var SELECTFAQAPI=DOMAIN+"swayamtalk/Api/Faq/SelectFaq";	

// SELECT BANNER
var SELECTBANNERAPI=DOMAIN+"swayamtalk/Api/Banner/SelectBanner";

// SELECT SPONSER
var SELECTSPONSERAPI=DOMAIN+"swayamtalk/Api/Sponser/SelectSponser";

// SELECT CONTACT
var SELECTCONTACTAPI=DOMAIN+"swayamtalk/Api/Contact/SelectContact";

// SELECT GALLERY
var SELECTGALLERYAPI=DOMAIN+"swayamtalk/Api/SwayamGallery/SelectSwayamGallery";

// SELECT MostVisitedCategory
var SELECTMOSTVISITEDCATEGORYAPI=DOMAIN+"swayamtalk/Api/Video/MostVisited";

// SELECT IMPACT
var SELECTIMPACTAPI=DOMAIN+"swayamtalk/Api/Impact/SelectImpact";

// SELECT BLOG
var SELECTBLOGAPI=DOMAIN+"swayamtalk/Api/Blogs/SelectBlogs";


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
var INSERTCATEGORYAPI=DOMAIN+"swayamtalk/Api/Category/AddCategory";

// INSERT LOCATION 
var INSERTLOCATIONAPI=DOMAIN+"swayamtalk/Api/Location/AddLocation";

// INSERT SPEAKER
var INSERTSPEAKERAPI=DOMAIN+"swayamtalk/Api/Speaker/AddSpeaker";

// INSERT VIDEO
var INSERTVIDEOAPI=DOMAIN+"swayamtalk/Api/Video/AddVideo";

// INSERT USERS
var INSERTUSERSAPI=DOMAIN+"swayamtalk/Api/User/AddUser";

// INSERT EVENT
var INSERTEVENTAPI=DOMAIN+"swayamtalk/Api/Event/AddEvent";

// INSERT FEEDBACK
var INSERTFEEDBACKAPI=DOMAIN+"swayamtalk/Api/Feedback/AddFeedback";	

// INSERT FAQ
var INSERTFAQAPI=DOMAIN+"swayamtalk/Api/Faq/AddFaq";	

// INSERT BANNER
var INSERTBANNERAPI=DOMAIN+"swayamtalk/Api/Banner/AddBanner";

// INSERT SPONSER
var INSERTSPONSERAPI=DOMAIN+"swayamtalk/Api/Sponser/AddSponser";

// INSERT CONTACT
var INSERTCONTACTAPI=DOMAIN+"swayamtalk/Api/Contact/AddContact";

// INSERT GALLERY
var INSERTGALLERYAPI=DOMAIN+"swayamtalk/Api/SwayamGallery/AddSwayamGallery";

// INSERT IMPACT
var INSERTIMPACTAPI=DOMAIN+"swayamtalk/Api/Impact/AddImpact";

// INSERT BLOG
var INSERTBLOGAPI=DOMAIN+"swayamtalk/Api/Blogs/AddBlogs";


/* DELETE API */

// DELETE CATEGORY
var DELETECATEGORYAPI=DOMAIN+"swayamtalk/Api/Category/DeleteCategory";

// DELETE LOCATION 
var DELETELOCATIONAPI=DOMAIN+"swayamtalk/Api/Location/DeleteLocation";

// DELETE SPEAKER
var DELETESPEAKERAPI=DOMAIN+"swayamtalk/Api/Speaker/DeleteSpeaker";

// DELETE VIDEO
var DELETEVIDEOAPI=DOMAIN+"swayamtalk/Api/Video/DeleteVideo";

// DELETE USERS
var DELETEUSERSAPI=DOMAIN+"swayamtalk/Api/User/DeleteUser";

// DELETE EVENT
var DELETEEVENTAPI=DOMAIN+"swayamtalk/Api/Event/DeleteEvent";

// DELETE FEEDBACK
var DELETEFEEDBACKAPI=DOMAIN+"swayamtalk/Api/Feedback/DeleteFeedback";	

// DELETE FAQ
var DELETEFAQAPI=DOMAIN+"swayamtalk/Api/Faq/DeleteFaq";	

// DELETE BANNER
var DELETEBANNERAPI=DOMAIN+"swayamtalk/Api/Banner/DeleteBanner";

// DELETE SPONSER
var DELETESPONSERAPI=DOMAIN+"swayamtalk/Api/Sponser/DeleteSponser";

// DELETE CONTACT
var DELETECONTACTAPI=DOMAIN+"swayamtalk/Api/Contact/DeleteContact";

// DELETE GALLERY TITLE
var DELETEGALLERYTITLEAPI=DOMAIN+"swayamtalk/Api/SwayamGallery/DeleteSwayamGalleryTitle";

// DELETE GALLERY IMAGES
var DELETEGALLERYIMAGESAPI=DOMAIN+"swayamtalk/Api/SwayamGallery/DeleteSwayamGalleryImages";

// DELETE IMPACT
var DELETEIMPACTAPI=DOMAIN+"swayamtalk/Api/Impact/DeleteImpact";

// DELETE BLOG
var DELETEBLOGAPI=DOMAIN+"swayamtalk/Api/Blogs/DeleteBlogs";


/* EDIT API */

// UPDATE VIDEO
var UPDATEVIDEOAPI=DOMAIN+"swayamtalk/Api/Video/UpdateVideo";

// UPDATE SPEAKER
var UPDATESPEAKERAPI=DOMAIN+"swayamtalk/Api/Speaker/UpdateSpeaker";

// UPDATE USERS
var UPDATEUSERSAPI=DOMAIN+"swayamtalk/Api/User/UpdateUser";

// UPDATE EVENT
var UPDATEEVENTAPI=DOMAIN+"swayamtalk/Api/Event/UpdateEvent";

// UPDATE IMPACT
var UPDATEIMPACTAPI=DOMAIN+"swayamtalk/Api/Impact/UpdateImpact";

// UPDATE BLOG
var UPDATEBLOGAPI=DOMAIN+"swayamtalk/Api/Blogs/UpdateBlogs";

// UPDATE CATEGORY
var UPDATECATEGORYAPI=DOMAIN+"swayamtalk/Api/Category/UpdateCategory";

// UPDATE LOCATION
var UPDATELOCATIONAPI=DOMAIN+"swayamtalk/Api/Location/UpdateLocation";

// UPDATE SPONSER
var UPDATESPONSERAPI=DOMAIN+"swayamtalk/Api/Sponser/UpdateSponser";



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