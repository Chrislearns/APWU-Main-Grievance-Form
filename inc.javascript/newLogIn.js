document.addEventListener("DOMContentLoaded", function(event) { 

  //Client side validation Checking fields with regex;
  
  const EMAIL_REGEX = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  const LETTERS_ONLY = /^[A-Za-z]+$/;
  const DATE_VALIDATION = /^(0[1-9]|1[012])[\-\/](0[1-9]|[12][0-9]|3[01])[\-\/](19|20)\d\d$/;
  const NUMBERS_ONLY = /^[0-9]+$/;
  const PHONE_VALIDATION = /^\d{10}$/;
  const LETTERS_NUMBERS = /^[0-9a-zA-Z]+$/;
  const PASSWORD_VALIDATION = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;

  //Client side validation for text and input fields

  //Full Name input validation

  const FULL_NAME = document.getElementById("full-name");
  const FULL_NAME_ERROR = document.getElementById("full-name-error");
  
  FULL_NAME.addEventListener('focusout', (event) => {

     FULL_NAME.value === "" ? FULL_NAME_ERROR.style.display = "block" : FULL_NAME_ERROR.style.display = "block";

  })

  //Drop down menu input validation

  const DROP_DOWN_MENU = document.getElementById("drop-down-menu");
  const DROP_DOWN_MENU_ERROR = document.getElementById("drop-down-menu-error");

  DROP_DOWN_MENU.addEventListener("focusout", (event) => {

     DROP_DOWN_MENU.value === 'none' ? DROP_DOWN_MENU_ERROR.style.display = "block" : DROP_DOWN_MENU_ERROR.style.display = block;

  })

  //Address field validation

  const ADDRESS = document.getElementById("address");
  const ADDRESS_ERROR = document.getElementById("address-error");

  ADDRESS.addEventListener("focusout", (event) => {

    ADDRESS.value === "" ? ADDRESS_ERROR.style.display = "block" : ADDRESS_ERROR.style.display = "none";

  })

  //Veteran drop down menu validation

  const VETERAN_DDM = document.getElementById("veteran_ddm");
  const VETERAN_STATUS_ERROR = document.getElementById("veteranStatus-error");

  VETERAN_DDM.addEventListener("focusout", (event) => {

    VETERAN_DDM.value === "none" ? VETERAN_STATUS_ERROR.style.display = "block" : VETERAN_STATUS_ERROR.style.display = "none";

  })

  //City field RegEx validation

  const CITY = document.getElementById("city");
  const CITY_REGEX = document.getElementById("city-regex");
  
  CITY.addEventListener("focusout", (event) => {

    LETTERS_ONLY.test(CITY.value) !== true ? CITY_REGEX.style.display = "block" : CITY_REGEX.style.display = "none";

  })

  //State RegEx validation

  const STATE = document.getElementById("state");
  const STATE_REGEX = document.getElementById("state-regex");

  STATE.addEventListener("focusout", () => {

    LETTERS_ONLY.test(STATE.value) !== true ? STATE_REGEX.style.display = "block" : STATE_REGEX.style.display = "none";

  })

  //Zip code RegEx validation

  const ZIP_CODE = document.getElementById("zipCode");
  const ZIP_CODE_ERROR = document.getElementById("zipCode-error");
  const ZIP_CODE_REGEX = document.getElementById("zipCode-regex");

  ZIP_CODE.addEventListener("focusout", () => {

    ZIP_CODE.value === "" ? ZIP_CODE_ERROR.style.display = "block" : ZIP_CODE_ERROR.style.display = "none";
    NUMBERS_ONLY.test(ZIP_CODE.value) !== true && ZIP_CODE.value !== "" ? ZIP_CODE_REGEX.style.display = "block" : ZIP_CODE_REGEX.style.display = "none";

  })

  //Phone number RegEx validation

  const PHONE_NUMBER = document.getElementById("phone-number");
  const PHONE_NUMBER_ERROR = document.getElementById("phoneNumber-error");
  const PHONE_NUMBER_REGEX = document.getElementById("phoneNumber-regex");

  PHONE_NUMBER.addEventListener("focusout", () => {

    PHONE_NUMBER.value === "" ? PHONE_NUMBER_ERROR.style.display = "block" : PHONE_NUMBER_ERROR.style.display = "none";
    PHONE_VALIDATION.test(PHONE_NUMBER.value) !== true && PHONE_NUMBER.value !== "" ? PHONE_NUMBER_REGEX.style.display = "block" : PHONE_NUMBER_REGEX.style.display = "none";

  })

  //Seniority Date validation

  const SENIORITY_DATE = document.getElementById("seniorityDate");
  const SENIORITY_DATE_ERROR = document.getElementById("seniorityDate-error");
  const SENIORITY_DATE_REGEX = document.getElementById("seniorityDate-regex");
  
  SENIORITY_DATE.addEventListener("focusout", () => {

    !SENIORITY_DATE.value ? SENIORITY_DATE_ERROR.style.display = "block" : SENIORITY_DATE_ERROR.style.display = "none";
    DATE_VALIDATION.test(SENIORITY_DATE.value) === false  ? SENIORITY_DATE_REGEX.style.display = "block" : SENIORITY_DATE_REGEX.style.display = "none";
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
