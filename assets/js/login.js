// ===== Login Validations =====
const username = document.getElementById("username");
const password = document.getElementById("password");
const remember = document.getElementById("remember");
const loginBtn = document.getElementById("login_btn");
const errorMsg = document.getElementById("error_msg"); // <p> tag

loginBtn.addEventListener("click", function (e) {
    // Prevent form from submitting until validation passes
    e.preventDefault();

    const usernameValue = username.value.trim();
    const passwordValue = password.value.trim();

    // Reset previous messages
    errorMsg.textContent = "";

    // Empty field validation
    if (usernameValue === "" || passwordValue === "") {
        errorMsg.textContent = "ERROR: Fields Cannot be Empty!!";
        return;
    }

    // Password length validation
    const minLength = 6;
    const maxLength = 18;
    if (passwordValue.length < minLength || passwordValue.length > maxLength) {
        errorMsg.textContent = `Password must be between ${minLength} and ${maxLength} Characters Long!!`;
        return;
    }

    // Remember Me checkbox validation
    if (!remember.checked) {
        errorMsg.textContent = "Please, Check 'Remember Me' before Login!!";
        return;
    }

    // If all checks pass, submit the form
    document.querySelector("form").submit();
});


// ===== Show / Hide Password =====
document.getElementById("togglePassword").addEventListener("click", function () {
    const pwd = document.getElementById("password");
    const eye = this.querySelector("i");

    if (pwd.type === "password") {
        pwd.type = "text";
        eye.classList.remove("fa-eye");
        eye.classList.add("fa-eye-slash");
    } else {
        pwd.type = "password";
        eye.classList.remove("fa-eye-slash");
        eye.classList.add("fa-eye");
    }
});
