var PASSREGEX = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
var NAMEREGEX = /^[a-zA-Z\-]+$/;


function checkUser(inputName) {
    var name = document.getElementById(inputName).value;
    if(!name.match(NAMEREGEX))
    {
        console.log("testfail");
        document.getElementById(inputName + "Err").innerHTML = "* Username is inncorrect format must be Letters only!";
    }
    else
    {
        console.log("testsuccess");
        document.getElementById(inputName + "Err").innerHTML = "*";
    }
}

function checkPassword(inputPass) {
    var pass = document.getElementById(inputPass).value;
    if(!pass.match(PASSREGEX))
    {
        console.log("testfail");
        document.getElementById(inputPass + "Err").innerHTML = "* Minimum eight characters, at least one uppercase letter, one lowercase letter, one number, and one special character is required!";
    }
    else
    {
        console.log("testsuccess");
        document.getElementById(inputPass + "Err").innerHTML = "*";
    }
}