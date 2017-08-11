/*if (email_RegEx.test($('#email-address1').val())){
  $('#email1-error').html("<div class = error>Invalid Email Format</div>");
  fieldErrs = true;
}*/
$(document).ready(function () {
  //Client side validation Checking fields with regex;
  let emailRegEx = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  let lettersOnly = /^[A-Za-z]+$/;
  let dateValid = /^(0[1-9]|1[012])[\-\/](0[1-9]|[12][0-9]|3[01])[\-\/](19|20)\d\d$/;
  let numbersOnly = /^[0-9]+$/;
  let phoneValid = /^\d{10}$/;
  let lettersNumber = /^[0-9a-zA-Z]+$/;
  let password = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;

  $("#full-name").focusout(function(){
    if($("#full-name").val() === ""){
      $("#full-name-error").show("slow");

    }
  })

  $("#drop-down-menu").focusout(function(){
    if ($('#drop-down-menu').val() ==='none'){
          $('#drop-down-menu-error').show("slow");

    }
  })
  $("#address").focusout(function(){
    if ($('#address').val() === "") {
        $('#address-error').show("slow");

    }
  })

  $("#veteran_ddm").focusout(function(){

          if ($('#veteran_ddm').val() ==='none'){
          $('#layOffProtected-error').show("slow");

    }
        })

  $('#city').focusout(function(){

        if (!lettersOnly.test($('#city').val())) {
        $('#city-regex').show("slow");

    }

  })
  $('#state').focusout(function(){
        if (!lettersOnly.test($('#state').val())) {
        $('#state-regex').show("slow");

    }

  })
  $("#zipCode").focusout(function(){
    if ($("#zipCode").val() === "") {
       $("#zipCode-error").show("slow");
     }
  })
  $("#phone-number").focusout(function(){
    if ($("#phone-number").val() === "") {
      $("#phoneNumber-error").show("slow");

    }
  })
  $("#seniorityDate").focusout(function(){
    if (!$("#seniorityDate").val()) {
      $("#seniorityDate-error").show("slow");

    }
  })
  $('#eid').focusout(function(){
        if (!numbersOnly.test($('#eid').val())) {
        $('#eid-error').show("slow");

    }

  })

  $('#payLevel').focusout(function(){
        if (!lettersNumber.test($('#payLevel').val())) {
        $('#payLevel-regex').show("slow");

    }

  })
  $('#payStep').focusout(function(){
        if (!lettersNumber.test($('#payStep').val())) {
        $('#payStep-regex').show("slow");

    }

  })
  $('#tour').focusout(function(){
        if (!(/[123]/).test($('#tour').val())) {
        $('#tour-regex').show("slow");

    }

  })
  if(!$("input[type='checkbox']").is(":checked")){

          $('#daysOff-error').show("slow");

    }

  $('#veteran_ddm').focusout(function(){
        if ($('#veteran_ddm').val() === "none") {
        $('#veteranStatus-error').show("slow");

    }

  })
  $("#layOff_ddm").focusout(function(){
        if ($("#layOff_ddm").val() === "none") {
        $("#layOffProtected-error").show("slow");

    }

  })

  $("#email-address1").focusout(function(){

        if (!emailRegEx.test($("#email-address1").val())) {
        $("#email1-regex").show("slow");

    }


  })
  $("#email-address2").focusout(function(){
        if (!emailRegEx.test($("#email-address2").val())) {
        $("#email2-regex").show("slow");

}
        if ($("#email-address1").val() !== $("#email-address2")) {
        $("#email2-equal").show("slow");

    }

  })
  $("#passwordField1").focusout(function(){
        if (!password.test($("#passwordField1").val())) {
        $('#password1-regex').show("slow");

    }

      })
  $("#passwordField2").focusout(function(){
        if (!password.test($('#passwordField2').val())) {
        $("#password2-regex").show("slow");


        if ($("#passwordField1").val() !== $("passwordField2").val()) {
        $("#password1-equal").show("slow");

    }

  }
})
    //Validation on submit;
    $("#sign-up-form").submit(function (event) {

  /*    if (fieldErrs) {
        event.preventDefault();
        $('.warnings').show("slow");
        return false;
      }
*/

   //Assume there are no errors
        var errors = false;

   //hide error messages
        $(".error").hide();

 //Make sure each field is not blank
    if ($("#full-name").val() === "") {
        $("#full-name-error").show("slow");
        errors = true;
    }


          if ($('#drop-down-menu').val() ==='none'){
                $('#drop-down-menu-error').show("slow");
                errors = true;
          }

        if ($('#address').val() === "") {
            $('#address-error').show("slow");
            errors = true;
        }


        if ($("#city").val() === "") {
            $("#city-error").show("slow");
            errors = true;
                }


         if ($("#state").val() === "") {
            $("#state-error").show("slow");
            errors = true;
                    }
         if ($("#zipCode").val() === "") {
            $("#zipCode-error").show("slow");
            errors = true;
                }
        if ($("#eid").val() === "") {
          $("#eid-error").show("slow");
            errors = true;
            }
        if ($("#phone-number").val() === "") {
          $("#phoneNumber-error").show("slow");
          errors = true;
        }
        if ($("#seniorityDate").val() === "") {
          $("#seniorityDate-error").show("slow");
          errors = true;
        }
        if ($("#payLevel").val() === "") {
          $("#payLevel-error").show("slow");
          errors = true;
        }
        if ($("#payStep").val() === "") {
          $("#payStep-error").show("slow");
          errors = true;
        }
        if ($("#tour").val() === "") {
          $("#tour-error").show("slow");
          errors = true;
        }
        if ($("#daysOff").val() === "") {
          $("#daysOff-error").show("slow");
          errors = true;
        }
        if ($(".veteranStatus").val() === "none") {
          $("#veteranStatus-error").show("slow");
          errors = true;
        }
        if ($(".layOffProtected").val() === "none") {
          $("#layOffProtected-error").show("slow");
          errors = true;
            }
        if ($('#email-address1').val()==="") {
            $('#email1-error').show("slow");
                errors = true;
                }

        if ( $('#email-address1').val() !== $('#email-address2').val()) {
              $('#email2-error').show("slow");
                errors = true;
                }
        if ($('#passwordField1').val() === "") {
            $('#password1-error').show("slow");
                errors = true;
                }

        if ( $('input[name=password2]').val() != $('input[name=password1]').val()) {

              $('#password1-equal').show("slow");
                errors = true;
                }


 //If there are errors then show a general error message

if(errors){
    event.preventDefault();

  $(".warnings").show("slow").fadeOut(5000);

  return false;
}

// If no errors show success message
/*
  if(!errors){
                $( "#submit" ).click(function(  ) {


});

                        $(".overlay").fadeIn();
                    return true;
                      }

 });*/
 //Make the Close window button work

            /*        $(".close").click(function() {
        $(".overlay").fadeOut();
       });
*/
});
$(".create-account").on("click", function () {
 $(".overlay").fadeIn("slow");
 $(".registration-form").fadeIn("slow");
 $('html, body').css({
   overflow: 'hidden',
   height: '100%'
 });
});


$( '.overlay').on('click', function(event) {
 $(".overlay, .registration-form").fadeOut("slow");
 $('html, body').css({
   overflow: 'auto',
   height: 'auto'
 });
});

});
