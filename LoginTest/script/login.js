$(document).ready(function() {

    $('input#login_btn').on('click', function() {

         var username = $('input#username').val();
         var password = $('input#password').val();

          $.post('../manage/php/loginProcess.php', {
              username:username,
              password:password

          }, function(data) {

          if (data == "Yes"){
              window.location.replace("../manage/home.html");
          }
          else{
              kendo.alert("Error!<br><br> Wrong Username or Password!");
          }

      });

    });
});
