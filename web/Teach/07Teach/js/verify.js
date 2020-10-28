var PASSREGEX = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
var NAMEREGEX = /^[a-zA-Z\-]+$/;


function checkUser(inputName) {
    var name = document.getElementById(inputName).value;
    if(!name.match(NAMEREGEX))
    {
        document.getElementById(inputName + "Err").innerHTML = "* Username is inncorrect format must be Letters only!";
    }
    else
    {
        document.getElementById(inputName + "Err").innerHTML = "*";
    }
}

function checkPassword(inputPass) {
    var pass = document.getElementById(inputPass).value;
    if(!pass.match(PASSREGEX))
    {
        document.getElementById(inputPass + "Err").innerHTML = "* Minimum eight characters, at least one uppercase letter, one lowercase letter, one number, and one special character is required!";
    }
    else
    {
        document.getElementById(inputPass + "Err").innerHTML = "*";
    }
}


function checkPasswordsmatch() {
    var pass1 = document.getElementById('pass').value;
    var pass2 = document.getElementById('pass2').value;
    if(pass1 != pass2)
    {
        document.getElementById('loginErr').innerHTML = "* Passwords do not match!";
    }
    else
    {
        document.getElementById('loginErr').innerHTML = "";
    }

}