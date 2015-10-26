/* <![CDATA[ */
jQuery(function(){
    jQuery("#ValidFirstName").validate({
        expression: "if (VAL) return true; else return false;",
        message: "Please enter the Required field"
    });
    jQuery("#ValidLastName").validate({
        expression: "if (VAL) return true; else return false;",
        message: "Please enter the Required field"
    });
    jQuery("#ValidNumber").validate({
        expression: "if (!isNaN(VAL) && VAL) return true; else return false;",
        message: "Please enter a valid number"
    });
    jQuery("#phone").validate({
        expression: "if (!isNaN(VAL) && VAL) return true; else return false;",
        message: "Please enter a valid number"
    });

    jQuery("#Email").validate({
        expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
        message: "Please enter a valid Email ID"
    });

    jQuery("#ValidConfirmPassword").validate({
        expression: "if ((VAL == jQuery('#password').val()) && VAL) return true; else return false;",
        message: "Confirm password field doesn't match the password field"
    });
    jQuery("#ValidSelection").validate({
        expression: "if (VAL != '0') return true; else return false;",
        message: "Please make a selection"
    });
    jQuery("#state").validate({
        expression: "if (VAL != '0') return true; else return false;",
        message: "Please make a selection"
    });

    jQuery('.AdvancedForm').validated(function(){
        alert("Use this call to make AJAX submissions.");
    });
});
/* ]]> */