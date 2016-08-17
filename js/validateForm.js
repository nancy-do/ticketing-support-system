/**
 * Created by WaiTung Yuen on 13/08/2016.
 */
$("#submit").click(function(){

    var rName = new RegExp(/^[a-z\s]{1,20}$/i);
    var rEmail = new RegExp (/^([a-z0-9]+@(student\.)?(ems\.)?rmit\.edu\.au)$/i);
    var rIssue = new RegExp (/^.{1,}$/i);

    /* Check if First name or Last name is valid */
    if ( (rName.test($("#fName").val()) == false)||(rName.test($("#lName").val())== false) ){
        alert("Invalid Name");
        return false;
    }

    /* Check if it is a valid rmit email */
    if ( (rEmail.test($("#Email").val())) == false) {
     alert("Invalid Email");
     return false;
     }

    /* Check if the Issue is empty */
    if ( (rIssue.test($("#Issue").val())) == false ) {
        alert("Issue cannot be empty");
        return false;
    }

});
