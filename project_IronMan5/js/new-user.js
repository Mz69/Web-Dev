$( document ).ready(function() {

    //Canadian Postal Code Regex
    let zip = /^([ABCEGHJKLMNPRSTVXY][0-9][ABCEGHJKLMNPRSTVWXYZ]) ?([0-9][ABCEGHJKLMNPRSTVWXYZ][0-9])$/i;

    let minTwoWords = /^[a-zA-Z]{2,40}(?: +[a-zA-Z]{2,40})+$/;
    let email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    let password = /^.*(?=.{8,})(?=.*[a-zA-Z])(?=.*\d)(?=.*[!#$%&? "]).*$/;
    let address = /^[0-9]{2,4}(?: +[a-zA-Z]{2,40})+$/;
    

    $("#name").on('input', function() {
        checkRegex(this, minTwoWords);
    });

    $("#email").on('input', function() {
        checkRegex(this, email);
    });

    $("#password").on('input', function() {
        checkRegex(this, password);
    });

    $("#address").on('input', function() {
        checkRegex(this, address);
    });

    $("#zip").on('input', function() {
        checkRegex(this, zip);
    });
    
    $('#confirm-password').on('keyup', function () {
        if($('#password').val() == $('#confirm-password').val()) {
            $('#message').html('Matching').css('color', 'green');
            $("#confirm-password").removeClass("is-invalid");
            $("#confirm-password").addClass("is-valid");
        }
        else {
            $('#message').html('Not Matching').css('color', 'red');
            $("#confirm-password").addClass("is-invalid");
            $("#confirm-password").removeClass("is-valid");
        }
    });

    function checkRegex(element, re) {
        console.log(re.test($(element).val()))
        if(re.test($(element).val())) {
            $(element).removeClass("is-invalid");
            $(element).addClass("is-valid");
        }
        else {
            $(element).removeClass("is-valid");
            $(element).addClass("is-invalid");
        }
    }    
});