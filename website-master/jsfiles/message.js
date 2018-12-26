var myId = -1;
var myname;
var friendId;
$(document).ready(function(){
  friendId = $('input#friendmId').val();
   myId = $('input#myUser').val();
   myname =$('input#mymsgName').val();

   $('button#submit').click(function(){
   if($('textarea#txtinput').val() != ''){
      var desc = $('textarea#txtinput').val();

       $.post('/HW3/php/sendMsg.php',{id : myId,fid : friendId  ,name : myname, descr : desc},function(result){
          var res = result.split(' ');
          if(res[0] == "ACK"){
              $('textarea#txtinput').val('');
              $('div#lblrow').html('<h4>Message Sent</h4>');
              $('textarea#txtinput').attr('placeholder','');
              $("ul.media-list").prepend(makeMsg(desc,myname,res[1]+' '+res[2]));
            }else {
              $('div#lblrow').html('<h4>Error Sending Message!</h4>');
          }
        });
      }else {
        $('textarea#txtinput').attr('placeholder','textarea is empty');
      }
    });

    loadHistory();
    setInterval(checkForMsg,1000);
    function checkForMsg(){
      $.post("/HW3/php/checkMsg.php",{id:myId,fid:friendId},function(result){
          if(result == "ACK"){
            loadHistory();
          }
      });
    }
    function loadHistory(){
      $("ul.media-list").empty();
      $.getJSON('/HW3/php/getMsgHistory.php',{id:myId,fid:friendId},function(result){
        $.each(result.Message,function(i,field){
          var msg = makeMsg(field.description,field.fname,field.date);
          $("ul.media-list").append(msg);
        });
      });
    }

});

function makeMsg(text,name,date) {
    var msg = '<li class="media">'+
      '<div class="media-body">'+
        '<div class="media">'+
         '<div class="pull-left">'+
             '<img class="media-object img-circle " src="icons/user_1_2.jpg">'+
         '</div>'+
         '<div class="media-body">'+
            text+
             '<br>'+
            '<small class="text-muted">'+name+' | '+date+'</small>'+
             '<hr>'+
         '</div>'+
     '</div>'+
   '</div>'+
 '</li>';

 return msg;
}
