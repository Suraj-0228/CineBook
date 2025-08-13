// Show Password
function showPassword() {
    var pwd = document.getElementById("password");
    var con_pwd = document.getElementById("confirm_password");
    if (pwd.type === "password") {
        pwd.type = "text";
        con_pwd.type = "text";
    } else {
        pwd.type = "password";
        con_pwd.type = "password";
    }
}