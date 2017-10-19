$(document).ready(function() {
    $(".submit").on("click",function () {
      //입력한 비밀번호가 일치하면
      var response = true;

      console.log(response);
      if(response){
        $(".signup_form").show();
        $(".findacc_container").hide();
      }else{
        $(".error-msg").show();
      }
    });
});
