function check(){

  var uname = $("input[name = user]").val();
  var passw = $("input[name = pass]").val();
  var son;

  $.post("/HW3/php/login.php", {user : uname, pass : passw}, function(result){
            var res = result.split(' ');
            if(res[0] == "NACK"){

              if(res[1] == "USER"){
                $("input[name = user]").css({ "border": '#FF0000 1px solid'});
                $("input[name = user]").val('');
                $('div#err_msg_log').html('<br> username is invalid !');
              }
              if(res[1] == "PASS"){

                $("input[name = pass]").val('');
                $("input[name = pass]").css({ "border": '#FF0000 1px solid', "coler" :'#FF0000'});
                $('div#err_msg_log').html('<br> password is invalid !');

              }else {
                $("input[name = user]").val('');
                $("input[name = user]").css({ "border": '#FF0000 1px solid'});
                $("input[name = pass]").val('');
                $("input[name = pass]").css({ "border": '#FF0000 1px solid', "coler" :'#FF0000'});
                $('div#err_msg_log').html('<br> user or password is invalid !');
              }
            }else {
                document.location='index.php';
              }
    });
  return false;
}

function register(){

  var username = $("input[name = username]").val();
  var password = $("input[name = password]").val();
  var passwordconfirmation = $("input[name = passwordconfirmation]").val();
  var firstname = $("input[name = firstname]").val();
  var lastname = $("input[name = lastname]").val();
  var job1 = $("input[name = job1]").val();
  var job2 = $("input[name = job2]").val();
  var skills = $("input[name = skills]").val();
  var exp1 = $("input[name = exp1]").val().split(' ');
  var exp2 = $("input[name = exp2]").val().split(' ');
  var bdate = $("input[name = bdate]").val();

  if(username==''){
      $("input[name = username]").css({ "border": '#FF0000 1px solid', "coler" :'#FF0000'});
  }else if(firstname == ''){
      $("input[name = firstname]").css({ "border": '#FF0000 1px solid', "coler" :'#FF0000'});
  }else if(lastname == ''){
      $("input[name = lastname]").css({ "border": '#FF0000 1px solid', "coler" :'#FF0000'});
  }else if(password == ''){
      $("input[name = password]").css({ "border": '#FF0000 1px solid', "coler" :'#FF0000'});
  }else if(passwordconfirmation == ''){
      $("input[name = passwordconfirmation]").css({ "border": '#FF0000 1px solid', "coler" :'#FF0000'});
  }else if(skills == ''){
      $("input[name = skills]").css({ "border": '#FF0000 1px solid', "coler" :'#FF0000'});
  }else if(password != passwordconfirmation){
    $("input[name = password]").css({ "border": '#FF0000 1px solid', "coler" :'#FF0000'});
    $("input[name = passwordconfirmation]").css({ "border": '#FF0000 1px solid', "coler" :'#FF0000'});
  }else if(bdate == ''){
    $("input[name = bdate]").css({ "border": '#FF0000 1px solid', "coler" :'#FF0000'});
  }else{
    $.post("/HW3/php/register.php",
     {
        user:username,
        pass:password,
        passconf:passwordconfirmation,
        fname:firstname,
        lname:lastname,
        date:bdate,
        jobO:job1,
        jobT:job2,
        skils:skills,
        expOc:exp1[0],
        expOy:exp1[1],
        expTc:exp2[0],
        expTy:exp2[1]
      }, function(result){

         $('div#err_msg').html('<br>'+result+' !');

         $("input[name = username]").val('');
         $("input[name = password]").val('');
         $("input[name = passwordconfirmation]").val('');
         $("input[name = firstname]").val('');
         $("input[name = job1]").val('');
         $("input[name = job2]").val('');
         $("input[name = skills]").val('');
         $("input[name = exp1]").val('');
         $("input[name = exp2]").val('');
         $("input[name = lastname]").val('');
         $("input[name = bdate]").val('');
    });
  }
  return false;
}
