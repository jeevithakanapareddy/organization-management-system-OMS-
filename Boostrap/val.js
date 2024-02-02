var str = "";


    function jqpassword1() {
        var name = $("#pas").val();
        var a = /^[A-Z]+[A-Za-z0-9@!~%$#*]{8,16}$/;

        if (!name.match(a)) {
            if (name === "") {
                $("#p12").html("Field can't be empty!!!");
            } else {
                $("#p12").html("Password must contain at least one special character, uppercase, lowercase letter, and number!!!");
            }
        } else {
            // Do something when the password is valid
            $("#p12").html("");
        }
    }



  

    // firstname
    function jqflname() {
        var name = $("#fname").val();
        var a = /^[A-Za-z]+$/;

        if (!name.match(a)) {
            if (name === "")
                $("#f").html("Field can't be empty!!!");
            else
                $("#f").html("Please enter only characters!!!");
        } else if (name.length > 60) {
            $("#f").html("Enter below 60 characters only!!!");
        } else {
            $("#f").html("");
            str = str + "a";
        }
    }

    function jqlname1() {
        var name = $("#lname").val();
        var a = /^[A-Za-z]+$/;

        if (!name.match(a)) {
            if (name === "")
                $("#l").html("Field can't be empty!!!");
            else
                $("#l").html("Please enter only characters!!!");
        } else if (name.length > 60) {
            $("#l").html("Enter below 60 characters only!!!");
        } else {
            $("#l").html("");
            str = str + "b";
        }
    }

    // phone number
    function jqphoneno() {
        var name = $("#phone").val();
        var a = /^[0-9]+$/;

        if (!name.match(a)) {
            if (name === "")
                $("#p1").html("Field can't be empty!!!");
            else
                $("#p1").html("Please enter digits only !!!");
        } else if (name.length !== 10) {
            $("#p1").html("Please enter valid phone number!!!");
        } else {
            $("#p1").html("");
            str = str + "c";
        }
    }

    // password
    function jqpassword1() {
        var name = $("#pas").val();
        var a = /^[A-Z]+[A-Za-z0-9@!~%$#*]{8,16}$/;

        if (!name.match(a)) {
            if (name === "")
                $("#p12").html("Field can't be empty!!!");
            else
                $("#p12").html("Not a strong password! Password must contain at least one special character, uppercase letter, lowercase letter, and number.");
        } else {
            str = str + "d";
            $("#p12").html("");
        }
    }

    // email
    function jqemail1() {
        var name = $("#em").val();
        var a = /^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]+$/;

        if (!name.match(a)) {
            if (name === "")
                $("#e1").html("Field can't be empty!!!");
            else
                $("#e1").html("Enter a valid email address!!!");
        } else {
            str = str + "e";
            $("#e1").html("");
        }
    }

    // date of birth
    function jqdateofbirth() {
        var name = $("#db").val();
        var today = new Date();
        var dob = new Date(name);

        if (isNaN(dob.getTime())) {
            $("#db1").html("Field can't be empty!!!");
        } else if (dob > today) {
            $("#db1").html("Date should be in the past!!!");
        } else {
            str = str + "f";
            $("#db1").html("");
        }
    }

    function jqskills1() {
        var checkboxes = $('input[name="skills[]"]:checked');
        if (checkboxes.length < 2) {
            $("#sk").html("Please select at least two skills!!!");
        } else {
            $("#sk").html("");
            str = str + "g";
        }
    }

    
    // function jqgender1() {
    //     var checkboxes = $('input[name="sj"]:checked');
    //     if (checkboxes==="") {
    //         $("#gen").html("Please select gender!!!");
    //     } else {
    //         $("#gen").html("");
    //         str = str + "g";
    //     }
    // }
   

    function jqReset1() {
        $("#f, #l, #p1, #p12, #e1, #db1, #sk, #gen").text("");
        $("#fname, #lname, #phone, #pas, #em, #db, #sj, #skills").val("");
        str="";
    }
