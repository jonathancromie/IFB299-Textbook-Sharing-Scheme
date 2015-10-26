jQuery(function(){
    jQuery("#ValidName").validate({ 
        expression: "if (VAL) return true; else return false;",
        message: "Please enter the Required field"
    });
    jQuery("#author").validate({ 
        expression: "if (VAL) return true; else return false;",
        message: "Please enter the Required field"
    });
    jQuery("#isbn").validate({ 
        expression: "if (VAL) return true; else return false;",
        message: "Please enter the Required field"
    });
    jQuery("#ValidPublisher").validate({ 
        expression: "if (VAL) return true; else return false;",
        message: "Please enter the Required field"
    });
    jQuery("#ValidEdition").validate({ 
        expression: "if (VAL) return true; else return false;",
        message: "Please enter the Required field"
    });                
    jQuery("#ValidFaculty").validate({
        expression: "if (VAL != '0') return true; else return false;",
        message: "Please make a selection"
    });
    jQuery("#ValidLocation").validate({ 
        expression: "if (VAL) return true; else return false;",
        message: "Please enter the Required field"
    });  
    // jQuery("#ValidDate").validate({
    //     expression: "if (!isValidDate(parseInt(VAL.split('-')[2]), parseInt(VAL.split('-')[0]), parseInt(VAL.split('-')[1]))) return false; else return true;",
    //     message: "Please enter a valid Date"
    // });
    // jQuery("#datetimepicker1").validate({
    //     expression: "if (!isValidDate(parseInt(VAL.split('-')[2]), parseInt(VAL.split('-')[0]), parseInt(VAL.split('-')[1]))) return false; else return true;",
    //     message: "Please enter a valid Date"
    // });               
    // jQuery("#datetimepicker2").validate({
    //     expression: "if (!isValidDate(parseInt(VAL.split('-')[2]), parseInt(VAL.split('-')[0]), parseInt(VAL.split('-')[1]))) return false; else return true;",
    //     message: "Please enter a valid Date"
    // });
    jQuery("#image").validate({ 
        expression: "if (VAL) return true; else return false;",
        message: "Please enter the Required field"
    });  

	jQuery('.AdvancedForm').validated(function(){
		alert("Use this call to make AJAX submissions.");
	});
});