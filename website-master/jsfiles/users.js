$(document).ready(function(){
  $.getJSON('/HW3/php/getAllUsers.php',function(result){
      $.each(result.Connections,function(i,field){
        var listitem = '<li class="list-group-item">'+
            '<div class="col-xs-12 col-sm-3">'+
                '<img src="icons/user_1_1.jpg" alt="'+field.firstname+' '+ field.lastname+'" class="img-responsive img-circle" />'+
            '</div>'+
            '<div class="col-xs-12 col-sm-9">'+
                '<a href="profile.php?id='+field.ID+'"><span class="name">'+field.firstname+' '+ field.lastname +'</span></a><br>'+
                '<span class="text-muted c-info" >Job 1: '+field.Job1+'</span><br>'+
                '<span class="text-muted c-info" >Job 2: '+field.Job2+'</span>'+
            '</div>'+
            '<div class="clearfix"></div>'+
            '</li>';

          $('ul.list-group.users.scrollable').append(listitem);
      });
  });
});
