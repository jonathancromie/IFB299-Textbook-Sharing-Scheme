/*

This checks if the entered emails belongs to QUT students (Ends with @connect.qut.edu.au)
If not this will return error msg explaining that users should be qut students

*/

$(document).ready(function() {
  $('#ValidEmail').focusout(function() {
    checkemail();
  });
});

//QUT Email Check
var testresults
function checkemail(){
var str=document.getElementById("ValidEmail").value
var filter=/^([\w-]+(?:\.[\w-]+)*)@connect.qut.edu.au/i
if (filter.test(str)) {
	// $('#emailspan').html('');
	document.getElementById("errors").style.display = 'none';
	testresults=true;
}
else{
	document.getElementById("errors").style.display = 'inline';
	document.getElementById("errors").style.color = "red";
	// $('#emailspan').html('Please input correct email');
	testresults=false
}
return testresults
}



//validate all form return each required valuation
function checkbae(){
if (document.layers||document.getElementById||document.all)
return checkemail()
else
return true
}
