
$(document).ready(function () {
  //Client side validation Checking fields with regex;
  let fieldErrs = false;

  $("#full-name").focusout(function(){

        if($("#full-name").val() == ""){
        $("#full-name-error").show("slow");
        fieldErrs = true;
  }
      })
  $("#address").focusout(function(){

        if($("#address").val() == ""){
        $("#address-error").show("slow");
        fieldErrs = true;
  }
      })

  $("#veteran_ddm").focusout(function(){

          if ($('#veteran_ddm').val() ==='none'){
          $('#layOffProtected-error').show("slow");
          fieldErrs = true;
    }
        })

  $('#city').focusout(function(){
        if ($('#city').val() === "") {
        $('#city-error').show("slow");
        fieldErrs = true;
    }

  })
  $('#state').focusout(function(){
        if ($('#state').val() === "") {
        $('#state-error').show("slow");
        fieldErrs = true;
    }

  })
  $('#zipCode').focusout(function(){
        if ($('#zipCode').val() === "") {
        $('#zipCode-error').show("slow");
        fieldErrs = true;
    }

  })
  $('#eid').focusout(function(){
        if ($('#eid').val() === "") {
        $('#eid-error').show("slow");
        fieldErrs = true;
    }

  })
  $('#phone-number').focusout(function(){
        if ($('#phone-number').val() === "") {
        $('#phoneNumber-error').show("slow");
        fieldErrs = true;
    }

  })
  $('#seniorityDate').focusout(function(){
        if ($('#seniorityDate').val() === "") {
        $('#seniorityDate-error').show("slow");
        fieldErrs = true;
    }

  })
  $('#payLevel').focusout(function(){
        if ($('#payLevel').val() === "") {
        $('#payLevel-error').show("slow");
        fieldErrs = true;
    }

  })
  $('#payStep').focusout(function(){
        if ($('#payStep').val() === "") {
        $('#payStep-error').show("slow");
        fieldErrs = true;
    }

  })
  $('#tour').focusout(function(){
        if ($('#tour').val() === "") {
        $('#tour-error').show("slow");
        fieldErrs = true;
    }

  })
  $('#daysOff').focusout(function(){
        if ($('#daysOff').val() === "") {
        $('#daysOff-error').show("slow");
        fieldErrs = true;
    }

  })
  $('#veteran_ddm').focusout(function(){
        if ($('#veteran_ddm').val() === "") {
        $('#veteranStatus-error').show("slow");
        fieldErrs = true;
    }

  })
  $('#layOff_ddm').focusout(function(){
        if ($('#layOff_ddm').val() === "") {
        $('#layOffProtected-error').show("slow");
        fieldErrs = true;
    }

  })

  $('#email-address1').focusout(function(){
        if ($('#email-address1').val() === "") {
        $('#email1-error').show("slow");
        fieldErrs = true;
    }

  })
  $('#email-address2').focusout(function(){
        if ($('#email-address1').val() !== $('#email-address2')) {
        $('#email2-error').show("slow");
        fieldErrs = true;
    }

  })
  $('#passwordField1').focusout(function(){
        if ($('#passwordField1').val() == "") {
        $('#password1-error').show("slow");
        fieldErrs = true;
    }

  })
  $('#passwordField2').focusout(function(){
        if ($('#passwordField1').val() !== $('passwordField2').val()) {
        $('#password2-error').show("slow");
        fieldErrs = true;
    }

  })
        //Validation on submit;
    $("#sign-up-form").submit(function (event) {




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

              $('#password2-error').show("slow");
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
