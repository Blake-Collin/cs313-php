var PASSREGEX = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
var NAMEREGEX = "/^[a-zA-Z\-]+$/";


function checkUser(inputName) {
    var name = document.getElementById(inputName).value;
    if(!name.value.match(NAMEREGEX))
    {
        
    }
}

function checkPassword() {

}