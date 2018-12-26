var myId=-1;
$(document).ready(function(){
  myId = $('input#myUser').val();
  $('button#addfriend').click(function(){
    var friendId = $('input#friendId').val();
    $.post('/HW3/php/addFriend.php',{id:myId,fid:friendId},function(result){
        if(result == "ACK"){
          $('div#addfriends').hide();
        }else {
          alert("Error adding friend");
        }
    });

  });
});
