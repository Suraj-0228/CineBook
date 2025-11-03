// ===== Login Validations =====
const username = document.getElementById("username");
const password = document.getElementById("password");
const remember = document.getElementById("remember");
const loginBtn = document.getElementById("login_btn");

loginBtn.addEventListener("click", function (e) {
    // Prevent form from submitting until validation passes
    e.preventDefault();

    const usernameValue = username.value.trim();
    const passwordValue = password.value.trim();

    // Empty field validation
    if (usernameValue === "" || passwordValue === "") {
        alert("ERROR: Fields are Empty!!!");
        return;
    }

    // Password length validation
    const minLength = 6;
    const maxLength = 18;
    if (passwordValue.length < minLength || passwordValue.length > maxLength) {
        alert(`Password must be between ${minLength} and ${maxLength} characters long!`);
        return;
    }

    // Remember Me checkbox validation
    if (!remember.checked) {
        alert("Please, Agree to the 'Remember Me' Option to Proceed!!!");
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
