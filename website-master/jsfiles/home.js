var myId=-1;

$(document).ready(function(){

 myId = $('input#myUser').val();

 $('button.btn.btn-default.dropdown-toggle.massages').click(function(){
   $("ul.dropdown-menu.massage").empty();
   $.getJSON("/HW3/php/getMsgs.php",{id:myId}, function(result){
     $.each(result.Message,function(i,field){
       var name = '<a href="message.php?id='+field.uID+'"><b>'+field.fname+'</b></a>';
       var header = '<h6>'+ name +'</h6>';
       var desc = '<p>' + field.description + '</p>';
       var listitem = '<li class="well">'+ header + "<br>"+ desc +' </li>';
       var separator = '<li role="separator" class="divider"></li>';
       $("ul.dropdown-menu.massage").append(listitem + separator);
     });
   });
 });

$.getJSON("/HW3/php/getJobs.php",{lmt:3}, function(result){
  $.each(result.Job,function(i,field){
    var header = '<h4>Position</h4>';
    var desc = '<p>' +'Company: ' + field.company + '  Address: '
                + field.address + ' Description: '+ field.description +'</p>';
    var listitem =  header + "<br>"+ desc;

    $("nav#adsNav").append('<div class="well">'  + listitem + '</div>');

  });
});


$('button#btn_showfriends').click(function(){
  $("ul.dropdown-menu.connections").empty();
  $.getJSON("/HW3/php/getFriends.php",{id : myId}, function(result){
    $.each(result.Friend,function(i,field){
      var name = '<b>'+field.firstname+' '+field.lastname+'</b>';
      var header = '<h6>'+ name +'</h6>';
      var listitem = '<li class="well"><a href = "profile.php?id='+field.id+'">'+ header +'</a></li>';
      var separator = '<li role="separator" class="divider"></li>';

      $("ul.dropdown-menu.connections").append( listitem + separator);

    });
  });
});

setInterval(checkForNotif, 1000);

function checkForNotif(){
  $.post("/HW3/php/getNotificCount.php",{id:myId},function(result){
      if(result == 'ACK'){
        loadNotifacations(false);
        $("#notf_img").attr("src","/HW3/icons/notfic.png");
      }
  });
}

function loadNotifacations(bool){
  var cnt=0;
  if(bool == true)
    $('ul.dropdown-menu.notifaction').empty();

  else if(bool == false)
    cnt=1;

    $.getJSON("/HW3/php/getnotifacations.php",{id:myId,count:cnt}, function(result){
      $.each(result.Notifacation,function(i,field){
        var name = '<b>'+field.fname+'</b>';
        var header = '<h6>'+ name +'</h6>';
        var dd = field.date.split(' ');
        var desc = '<p>'+field.description+ "<br>"+dd[0] +'</p>';
        var dt = '<p>' + dd[0] + '</p>';
        var listitem = '<li class="well">'+ header + "<br>"+ desc +  ' </li>';
        var separator = '<li role="separator" class="divider"></li>';
      if(bool == true)
        $('ul.dropdown-menu.notifaction').append(listitem + separator);
      else if(bool == false)
          $('ul.dropdown-menu.notifaction').prepend(listitem + separator);
       });
    });
  }
$('button.btn.btn-default.dropdown-toggle.notifactions').click(function(){
  loadNotifacations(true);
  $("#notf_img").attr("src","/HW3/icons/notification.png");
});


});

function showHint(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "php/getinfo.php?q=" + str, true);
    xmlhttp.send();
  }
}
