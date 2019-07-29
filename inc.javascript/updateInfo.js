$(document).ready(function () {


    $("#update-account-info-form").submit(function (event) {




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
          $("#lay-off-protected-error").show("slow");
          errors = true;
        }

        if ($('#passwordField1').val()==="") {
          $('#password1-error').show("slow");
          errors = true;
        }
        if ($('input[name=password2]').val() === "") {
          $("#password2-error").show("slow");
          errors = true;
        }
        if ($('input[name=password2]').val() !== $('input[name=password3]').val()) {
          $('#password3-error').show("slow");
          errors = true;
        }




 //If there are errors then show a general error message

if(errors){

  $(".warnings").show("slow").fadeOut(5000);

  return false;
}

// If no errors show success message

  if(!errors){
                $( "#submit" ).click(function(  ) {


});

                        $(".overlay").fadeIn();
                    return true;
                      }

 });        //Make the Close window button work
                    $(".close").click(function() {
        $(".overlay").fadeOut();


            });

});
