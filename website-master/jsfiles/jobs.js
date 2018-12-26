
$(document).ready(function(){

  $.getJSON("/HW3/php/getJobs.php", function(result){
    $.each(result.Job,function(i,field){
      var listitem = '<li class="list-group-item">'+
      '<div class="col-xs-12 col-sm-3">'+
          '<img src="icons/case.png" alt="Job" class="img-responsive img-circle" />'+
      '</div>'+
      '<div class="col-xs-12 col-sm-9">'+
          '<span class="name">'+field.company +'</span><br>'+
          '<span class="text-muted c-info" >Address: '+field.address+'</span><br>'+
          '<span class="text-muted c-info" >Description: '+field.description+'</span><br>'+
          '<span class="text-muted c-info" >Email: '+field.email+'</span>'+
      '</div>'+
      '<div class="clearfix"></div>'+
      '</li>';

    $('ul.list-group.jobs.scrollable').append(listitem);

    });
  });

});
