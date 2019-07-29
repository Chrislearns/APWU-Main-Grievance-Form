document.addEventListener("DOMContentLoaded", function() { 

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
  
  FULL_NAME.addEventListener('focusout', () => {

     FULL_NAME.value === "" ? FULL_NAME_ERROR.style.display = "block" : FULL_NAME_ERROR.style.display = "block";

  })

  //Drop down menu input validation

  const DROP_DOWN_MENU = document.getElementById("drop-down-menu");
  const DROP_DOWN_MENU_ERROR = document.getElementById("drop-down-menu-error");

  DROP_DOWN_MENU.addEventListener("focusout", () => {

     DROP_DOWN_MENU.value === 'none' ? DROP_DOWN_MENU_ERROR.style.display = "block" : DROP_DOWN_MENU_ERROR.style.display = block;

  })

  //Address field validation

  const ADDRESS = document.getElementById("address");
  const ADDRESS_ERROR = document.getElementById("address-error");

  ADDRESS.addEventListener("focusout", () => {

    ADDRESS.value === "" ? ADDRESS_ERROR.style.display = "block" : ADDRESS_ERROR.style.display = "none";

  })

  //Veteran drop down menu validation

  const VETERAN_DDM = document.getElementById("veteran_ddm");
  const VETERAN_STATUS_ERROR = document.getElementById("veteranStatus-error");

  VETERAN_DDM.addEventListener("focusout", () => {

    VETERAN_DDM.value === "none" ? VETERAN_STATUS_ERROR.style.display = "block" : VETERAN_STATUS_ERROR.style.display = "none";

  })

  //City field RegEx validation

  const CITY = document.getElementById("city");
  const CITY_REGEX = document.getElementById("city-regex");
  
  CITY.addEventListener("focusout", () => {

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

    //Employee ID number Validation

    const EMPLOYEE_ID = document.getElementById("eid");
    const EMPLOYEE_ID_ERROR = document.getElementById("eid-error");

    EMPLOYEE_ID.addEventListener("focusout", () => {

      EMPLOYEE_ID.value === "" ? EMPLOYEE_ID_ERROR.style.display = "block" : EMPLOYEE_ID_ERROR.style.display = "none";

      // This fields error message will be updated to a Reg Ex error message
      // Also will be adding a EID RegEx validation

      // NUMBERS_ONLY.test(EMPLOYEE_ID.value) == false ? EMPLOYEE_ID_ERROR.style.display = "block" : EMPLOYEE_ID_ERROR.style.display = "none";

    })

    //Pay level validation

    const PAY_LEVEL = document.getElementById("payLevel");
    const PAY_LEVEL_ERROR = document.getElementById("payLevel-error");
    const PAY_LEVEL_REGEX = document.getElementById("payLevel-regex");

    PAY_LEVEL.addEventListener("focusout", () => {

      PAY_LEVEL.value === "" ? PAY_LEVEL_ERROR.style.display = "block" : PAY_LEVEL_ERROR.style.display = "none";

      //Here I need to add a call to a Pay Level RegEx validator and reference the RegEx error message

    })

    //Pay Step validation
  
    const PAY_STEP = document.getElementById("payStep");
    const PAY_STEP_ERROR = document.getElementById("payStep-error");
    const PAY_STEP_REGEX = document.getElementById("payStep-regex");

    PAY_STEP.addEventListener("focusout", () => {

      PAY_STEP.value === "" ? PAY_STEP_ERROR.style.display = "block" : PAY_STEP_ERROR.style.display = "none";

      LETTERS_NUMBERS.test(PAY_STEP.value) === false ? PAY_STEP_REGEX.style.display = "block" : PAY_STEP_REGEX.style.display = "none";

    })
 
    //Tour/Shift validation
    const TOUR = document.getElementById("tour");
    const TOUR_ERROR = document.getElementById("tour-error");
    const TOUR_REGEX = document.getElementById("tour-regex");

    TOUR.addEventListener("focusout", () => {

      TOUR.value === "" ? TOUR_ERROR.style.display = "block" : TOUR_ERROR.style.display = "none";

      (/[123]/).test(TOUR.value) === false ? TOUR_REGEX.style.display = "block" : TOUR_REGEX.style.display = "none";

  })

    //Checkbox validation 
    const DAYS_OFF_ERROR = document.getElementById("daysOff-error");
    const DAYS_OFF_ARRAY = document.getElementsByName("daysOff[]");
    

    

    //To see if each checkbox is has a check

    DAYS_OFF_ARRAY.forEach((checkbox) => {

      checkbox.addEventListener("focusout", () => {

        checkbox.checked === false ? DAYS_OFF_ERROR.style.display = "block" : DAYS_OFF_ERROR.style.display = "none";

      })
    })

    //Lay Off protection drop down menu validation
    const LAY_OFF_PROTECTED = document.getElementById("lay-off-protected-drop-down-menu");
    const LAY_OFF_PROTECTED_ERROR = document.getElementById("lay-off-protected-error");

    LAY_OFF_PROTECTED.addEventListener("focusout", () => {

      LAY_OFF_PROTECTED.value === "none" ? LAY_OFF_PROTECTED_ERROR.style.display = "block" : LAY_OFF_PROTECTED_ERROR.style.display = "none";

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
   
})

$(".create-account").on("click", function () {
 $(".overlay").fadeIn("slow");
 $(".registration-form").fadeIn("slow");
 $('html, body').css({
   overflow: 'hidden',
   height: '100%'
 });
});


$( '.overlay').on('click', function() {
 $(".overlay, .registration-form").fadeOut("slow");
 $('html, body').css({
   overflow: 'auto',
   height: 'auto'
 });
});


