var str="";

function jqdateofbirth() {
    var name = $("#db").val();
    var today = new Date();
    var dob = new Date(name);

    if (isNaN(dob.getTime())) {
      showErrorTooltip("Field can't be empty!!!", "dob-error-tooltip");
    } else if (dob > today) {
      showErrorTooltip("Date should be in the past!!!", "dob-error-tooltip");
    } else {
        str = str + "a";
        hideErrorTooltip("dob-error-tooltip");
    }
}


function jqflname() {
var name = $("#fname").val();
var a = /^[A-Za-z]+$/;

if (!name.match(a)) {
    if (name === "") {
        showErrorTooltip("Field can't be empty!!!", "fname-error-tooltip");
    } else {
        showErrorTooltip("Please enter only characters!!!", "fname-error-tooltip");
    }
} else if (name.length > 60) {
    showErrorTooltip("Enter below 60 characters only!!!", "fname-error-tooltip");
} else {
    str = str + "b";
    hideErrorTooltip("fname-error-tooltip");
}
}





var str = "";


    function jqpassword1() {
        var name = $("#pas").val();
        var a = /^[A-Z]+[A-Za-z0-9@!~%$#*]{8,16}$/;

        if (!name.match(a)) {
            if (name === "") {
                showErrorTooltip("Field can't be empty!!!","password-error-tooltip");
            } else {
                showErrorTooltip("Password must contain at least one special character, uppercase, lowercase letter, and number!!!","password-error-tooltip");
            }
        } else {
            str = str + "c";
            // Do something when the password is valid
            hideErrorTooltip("password-error-tooltip");
        }
    }



  



    function jqlname1() {
        var name = $("#lname").val();
        var a = /^[A-Za-z]+$/;

        if (!name.match(a)) {
            if (name === "")
            showErrorTooltip("Field can't be empty!!!", "lname-error-tooltip" );
            else
            showErrorTooltip("Please enter only characters!!!", "lname-error-tooltip");
        } else if (name.length > 60) {
            showErrorTooltip("Enter below 60 charactersrrrrrr only!!!", "lname-error-tooltip");
        } else {
            str = str + "d";
            hideErrorTooltip("lname-error-tooltip");
           
        }
    }

    // phone number
    function jqphoneno() {
        var name = $("#phone").val();
        var a = /^[0-9]+$/;

        if (!name.match(a)) {
            if (name === "")
            showErrorTooltip("Field can't be empty!!!","phone-error-tooltip");
            else
            showErrorTooltip("Please enter digits only !!!","phone-error-tooltip");
        } else if (name.length !== 10) {
            showErrorTooltip("Please enter valid phone number!!!","phone-error-tooltip");
        } else {
            str = str + "e";
            hideErrorTooltip("phone-error-tooltip");
         
        }
    }

    // // password
    // function jqpassword1() {
    //     var name = $("#pas").val();
    //     var a = /^[A-Z]+[A-Za-z0-9@!~%$#*]{8,16}$/;

    //     if (!name.match(a)) {
    //         if (name === "")
    //             $("#p12").html("Field can't be empty!!!");
    //         else
    //             $("#p12").html("Not a strong password! Password must contain at least one special character, uppercase letter, lowercase letter, and number.");
    //     } else {
    //         str = str + "d";
    //         $("#p12").html("");
    //     }
    // }

    // email
    function jqemail1() {
        var name = $("#em").val();
        var a = /^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]+$/;

        if (!name.match(a)) {
            if (name === "")
            showErrorTooltip("Field can't be empty!!!","email-error-tooltip");
            else
            showErrorTooltip("Enter a valid email address!!!", "email-error-tooltip");
        } else {
            str = str + "f";
            hideErrorTooltip("email-error-tooltip");
        }
    }

    

    function jqskills1() {
        var checkboxes = $('input[name="skills[]"]:checked');
        if (checkboxes.length < 2) {
            showErrorTooltip("Please select at least two skills!!!", "skills-error-tooltip");
        } else {
            str = str + "g";
            hideErrorTooltip("skills-error-tooltip");
           
        }
    }

    
    function jqgender1() {
        var checkboxes = $('input[name="sj"]:checked');
        if (checkboxes==="") {
            showErrorTooltip("Please select gender!!!","gender-error-tooltip");
        } else {
            str = str + "h";
            hideErrorTooltip("gender-error-tooltip");
          
        }
    }
   

    function jqReset1() {
        $("#f, #l, #p1, #p12, #e1, #db1, #sk, #gen").text("");
        $("#fname, #lname, #phone, #pas, #em, #db, #sj, #skills").val("");
        $(gender-error-tooltip,skills-error-tooltip).val("");
    }


function showErrorTooltip(message, elementId) {
    $("#" + elementId).text(message);
    $("#" + elementId).show();
}

function hideErrorTooltip(elementId) {
    $("#" + elementId).text("");
    $("#" + elementId).hide();
}