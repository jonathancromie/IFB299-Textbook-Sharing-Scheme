/*

This checks if the entered emails belongs to QUT students (Ends with @connect.qut.edu.au)
If not this will return error msg explaining that users should be qut students

*/


//QUT Email Check
var testresults
function checkemail(){
var str=document.validation.emailcheck.value
var filter=/^([\w-]+(?:\.[\w-]+)*)@connect.qut.edu.au/i
if (filter.test(str))
testresults=true
else{
alert("Please input a QUT email address!")
testresults=false
}
return (testresults)
}



//validate all form return each required valuation
function checkbae(){
if (document.layers||document.getElementById||document.all)
return checkemail()
else
return true
}
