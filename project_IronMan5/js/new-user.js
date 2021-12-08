$( document ).ready(function() {

    //Canadian Postal Code Regex
    //Inspired by: https://stackoverflow.com/questions/1146202/canadian-postal-code-validation
    //Author: Gordon Gustafson
    //Date Accessed: December 6, 2021
    let zip = /^([ABCEGHJKLMNPRSTVXY][0-9][ABCEGHJKLMNPRSTVWXYZ]) ?([0-9][ABCEGHJKLMNPRSTVWXYZ][0-9])$/i;

    //At least two words of min length 2 characters
    let minTwoWords = /^[a-zA-Z]{2,40}(?: +[a-zA-Z]{2,40})+$/;

    //Email Rejex
    //Taken from: https://www.w3resource.com/javascript/form/email-validation.php
    //Author: Team at W3 schools
    //Date accessed: December 6, 2021
    let email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    //At least 5 characters
    let password = /^.{5,}$/;

    //Min two words, first one contains 2-4 numbers
    let address = /^[0-9]{2,4}(?: +[a-zA-Z]{2,40})+$/;
    

    //Adding event listeners for form input
    $("#name").on('input', function() {
        checkRegex(this, minTwoWords);
    });

    $("#email").on('input', function() {
        checkRegex(this, email);
    });

    $("#password").on('input', function() {
        if(!checkRegex(this, password)) {
            $("#password-message").html("Must be at least 5 characters").css('color', 'red');
        }
        else {
            $("#password-message").html("");
        }
    });

    $("#address").on('input', function() {
        checkRegex(this, address);
    });

    $("#zip").on('input', function() {
        checkRegex(this, zip);
    });
    
    //Checks for matching passwords
    $('#confirm-password').on('input', function () {
        if($('#password').val() == $('#confirm-password').val()) {
            $('#message').html('');
            $("#confirm-password").removeClass("is-invalid");
            $("#confirm-password").addClass("is-valid");
        }
        else {
            $('#message').html('Not Matching').css('color', 'red');
            $("#confirm-password").addClass("is-invalid");
            $("#confirm-password").removeClass("is-valid");
        }
    });

    //Checks that the content of passed element matches the given rejex
    function checkRegex(element, re) {
        console.log(re.test($(element).val()))
        if(re.test($(element).val())) {
            $(element).removeClass("is-invalid");
            $(element).addClass("is-valid");
            return true;
        }
        else {
            $(element).removeClass("is-valid");
            $(element).addClass("is-invalid");
            return false;
        }
    }    
});