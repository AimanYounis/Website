var myId=-1;
var userNamee;

$(document).ready(function(){

  myId = $('input#myUser').val();
  userNamee = $('input#myNameee').val();

  getPost();

  $('button#btn_share').click(addPost);

  setInterval(getPost, 20000);

  function getPost(){
    $("div.posts").empty();
    $.getJSON("/HW3/php/getPosts.php",{id:myId},function(result){
      $.each(result.Post,function(i,field){

          var post = makePost(field.userID,field.name,field.date,field.description,field.likes,field.postID);
          var comment = [];

          for (var l = 0; l < field.Comments.length; l++) {
              var cmt = makeComment(field.Comments[l].id,field.Comments[l].commented,field.Comments[l].date,field.Comments[l].comment);
              comment.push(cmt);
            }

          var pf =  '<ul class="comments-list" id = "clistpost'+field.postID+'">';
          for (var k = 0; k < comment.length; k++) {
              pf += comment[k];
            }
          pf +=  '</ul>';
          pf +=  '</div>';
          pf +='</div>';

          $("div.posts").append(post+pf);
        });
      });
    }

  function addPost() {
    var text = $("textarea#textinput").val();
    var post='';
    var pf='';

    $.post("/HW3/php/insertPost.php", {id : myId, desc : text}, function(result){
      var res = result.split(' ');

      if(res[0] == "ACK"){
        post = makePost(myId,userNamee,res[2]+' '+res[3],text,0,res[1]);
        pf =  '<ul class="comments-list" id = "clistpost'+res[1]+'">'+
            '</ul>'+
          '</div>'+
        '</div>';
        $("textarea#textinput").val('');
        $("div.posts").prepend(post+pf);
      }else{
        alert("Somthing Went Wrong!");
      }
    });

  }

});

function likePost(pId){

  $.post("/HW3/php/addLike.php",{id:myId,pid:pId},function(result){
    var res = result.split(' ');
    if(res[0] == "ACK" ){
      $('button.btn.btn-default.stat-item.like').html(res[1]+' Likes');
    }else {
      $.post("/HW3/php/deleteLike.php",{id:myId,pid:pId},function(result){
        res = result.split(' ');
        if(res[0] == "ACK" ){
          $('button.btn.btn-default.stat-item.like').html(res[1]+' Likes');
        }
      });
    }
  });
}

function switchup(i){
  $("div#postf"+i).toggle();
}

function addComment(i){
  var comment = $("textarea#commentpost"+i).val();
  var obj = '';
  $.post("/HW3/php/insertComment.php", {id : myId , pid : i, desc : comment}, function(result){
        var res = result.split(' ');

        if(res[0] == "ACK"){
            obj = makeComment(myId,userNamee,res[1]+' '+res[2],comment);
            $("textarea#commentpost"+i).val('');
            $("ul#clistpost"+i).append(obj);
        }else{
            alert("Somthing Went Wrong!");
        }
    });
  }

function makePost(userId,name,date,description,likes,postID){

  var post ='<div class="panel panel-white post">' +
      '<div class="post-heading">' +
          '<div class="pull-left image">'+
              '<img src="icons/user_1.jpg" class="img-circle avatar" alt="user profile image">'+
          '</div>'+
          '<div class="pull-left meta">'+
              '<div class="title h5">'+
                  '<a href="profile.php?id='+ userId +'"><b>'+name+'</b></a>'+
                  ' made a post.'+
              '</div>'+
              '<h6 class="text-muted time">'+date+'</h6>'+
          '</div>'+
      '</div>'+
      '<div class="post-description">'+
      '<input type="hidden" id="hPostId" value="'+postID+'">'+
          '<p>'+description+'</p>'+
          '<div class="stats">'+
              '<button class="btn btn-default stat-item like" onclick="likePost('+postID+')">'+likes+
              ' Likes</button>'+
              '<button class = "btn btn-default hide/show" type="button" role="button" name="button" id="hide" onclick ="switchup('+postID+')"> show/hide comments </button>'+
          '</div>'+
      '</div>'+
      '<div class="post-footer" id = "postf'+ postID+'">'+
          '<div class="input-group">'+
              '<textarea class="form-control" placeholder="Add a comment" id = "commentpost'+ postID +'"></textarea>'+
              '<span class="input-group-addon"  onclick ="addComment('+ postID +')" >'+
                  '<i class="fa fa-edit">Share</i>'+
              '</span>'+
          '</div>';

          return post;
    }

function makeComment(id,commented,date,comment){
  var cmt = '<li class="comment">'+
        '<a class="pull-left" href="profile.php?id='+id+'">'+
            '<img class="avatar" src="icons/user_1.jpg" alt="avatar">'+
          '</a>'+
        '<div class="comment-body">'+
            '<div class="comment-heading">'+
                '<h4 class="user"><a href="profile.php?id='+id+'">'+commented+'</a></h4>'+
                '<h5 class="time text-muted">'+date+'</h5>'+
              '</div>'+
            '<p>'+comment+'</p>'+
          '</div>'+
      '</li>';

    return cmt;
  }
