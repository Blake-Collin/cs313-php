var PASSREGEX = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
var NAMEREGEX = "/^[a-zA-Z\-]+$/";


function checkUser(inputName) {
    var name = document.getElementById(inputName).value;
    if(!name.value.match(NAMEREGEX))
    {
        document.getElementById(inputName + "Err").value = "* Username is inncorrect format must be Letters only!";
    }
    else
    {
        document.getElementById(inputName + "Err").value = "*";
    }
}

function checkPassword(inputPass) {
    var pass = document.getElementById(inputPass).value;
    if(!pass.value.match(PASSREGEX))
    {
        document.getElementById(inputPass + "Err").value = "* Minimum eight characters, at least one uppercase letter, one lowercase letter, one number, and one special character is required!";
    }
    else
    {
        document.getElementById(inputPass + "Err").value = "*";
    }
}