$(document).ready(function(){
getMostVisitedCategory();
getVideos();
countUser();
countSponsersJoinus();
countOrganizersJoinus();
countAudiancesJoinus();
countSpeakersJoinus();
});
function getMostVisitedCategory(){
  var data1=[];
    $.ajax({
    url:SELECTMOSTVISITEDCATEGORYAPI,
    type:"GET",
    success:function(data){
      data1.push(['Category Name','Views']);
      data.map(function(v,i){
        data1.push([v.categoryName,    Number(v.views)]);
      })
      console.log(data1)
      loadCatChart(data1);
    }
  });
}


function loadCatChart(chartData){
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(chartData);

        var options = {
          title: 'Most Visited Category',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('catchart'));
        chart.draw(data, options);
      }
    }

// Get Videos & views Count
   function getVideos() {
   var viewers=0;
  var videos=0;
  $.ajax({
    url:SELECTVIDEOAPI,
    type:"GET",
    success:function(data){
      var tableData;
 videos=data.length;
      var sortedData=_.sortBy(data, function(v){return v.videoViews}).reverse(); 
      sortedData.map(function(value,index){
         viewers=viewers+Number(value.videoViews);
        if(index <10){
                tableData+="<tr>"+
                "<td class='center'>"+(index+1)+"</td>"+
                "<td class='center'>"+value.videoName+" / "+value.videoName_M+"</td>"+
                "<td class='center'>"+value.videoViews+"</td>"+
                "</tr>";
              }
      });
      setViewers(viewers);
      setVideosCount(videos);
      $("#video-views").html(tableData);    
      tableScript();  
      
      // if(isShowPage)
      // $('#loader').hide();
    }
  });
}
 
function countUser(){
  totalusers=0;
  newusers=0;
  userCount=0;
  var currentMonth=new Date().getMonth();
  $.ajax({
    url:SELECTUSERSAPI,
    type:"GET",
    success:function(data){
      totalusers=data.length;
      data.map(function(value,index){
       var userMonth=new Date(value.timestamp).getMonth();
       currentMonth===userMonth && userCount++;
    });
    setUsers(totalusers);
    setNewUsers(userCount);
  }
});
}


// Get  Sponser count
function countSponsersJoinus(){
  var sponsor=0;
  $.ajax({
    url:SHOWSPONSERJOIN,
    type:"GET",
    success:function(data){
      sponsor=data.length;
      setcountsponsor(sponsor);
    }
  });
}


// Get  Organizer count
function countOrganizersJoinus(){
  var organizer=0;
  $.ajax({
    url:SHOWORGANIZERJOIN,
    type:"GET",
    success:function(data){
     organizer=data.length;
      setcountOrganizer(organizer);
    }
  });
}

// Get  Audiance count
function countAudiancesJoinus(){
  var audiance=0;
  $.ajax({
    url:SHOWAUDIANCEJOIN,
    type:"GET",
    success:function(data){
      audiance=data.length;
      setcountAudiance(audiance);
    }
  });
}

// Get  Speaker count
function countSpeakersJoinus(){
  var speaker=0;
  $.ajax({
    url:SHOWSPEAKERJOIN,
    type:"GET",
    success:function(data){
      speaker=data.length;
      setcountSpeaker(speaker);
    }
  });
}

/* For Viewers*/
function setViewers(viewers,no=0) {
   $('#viewers').html(no);
   no++;
  no<=viewers&&setTimeout(setViewers,1,viewers,no)
}

/* For Video */
function setVideosCount(videos,no=0) {
   $('#videos').html(no);
   no++;
  no<=videos&&setTimeout(setVideosCount,1,videos,no)
}

/* For Users */
function setUsers(users,no=0) {
   $('#users').html(no);
   no++;
  no<=users&&setTimeout(setUsers,1,users,no)
}

/* For New Users */
function setNewUsers(newusers,no=0) {
   $('#newusers').html(no);
   no++;
  no<=newusers&&setTimeout(setNewUsers,1,newusers,no)
}

/* For Sponsor*/
function  setcountsponsor(sponsor,no=0) {
   $('#countsponsor').html(no);
   no++;
  no<=sponsor&&setTimeout(setcountsponsor,1,sponsor,no)
}

/* For Organizer*/
function  setcountOrganizer(organizer,no=0) {
   $('#countOrganizer').html(no);
   no++;
  no<=organizer&&setTimeout(setcountOrganizer,1,organizer,no)
}

/* For Audiance*/
function  setcountAudiance(audiance,no=0) {
   $('#countAudiance').html(no);
   no++;
  no<=audiance&&setTimeout(setcountAudiance,1,audiance,no)
}

/* For Speaker*/
function  setcountSpeaker(speaker,no=0) {
   $('#countSpeaker').html(no);
   no++;
  no<=speaker&&setTimeout(setcountSpeaker,1,speaker,no)
}