// ===== Login Validations =====
const email = document.getElementById("email");
const password = document.getElementById("password");
const remember = document.getElementById("remember");
const loginBtn = document.getElementById("login_btn");
const errorMsg = document.getElementById("error_msg");

// Extra safety: only run if button exists (on login page)
if (loginBtn && email && password) {
    loginBtn.addEventListener("click", function (e) {
        e.preventDefault();

        const emailValue = email.value.trim();
        const passwordValue = password.value.trim();

        errorMsg.textContent = "";

        if (emailValue === "" || passwordValue === "") {
            errorMsg.textContent = "ERROR: Fields Cannot be Empty!";
            return;
        }

        if (!emailValue.includes("@") || !emailValue.includes(".com")) {
            errorMsg.textContent = "Please, Enter a valid Email Address!!";
            return;
        }

        const minLength = 6;
        const maxLength = 18;
        if (passwordValue.length < minLength || passwordValue.length > maxLength) {
            errorMsg.textContent = `Password must be between ${minLength} and ${maxLength} Characters Long!!`;
            return;
        }

        if (!remember.checked) {
            errorMsg.textContent = "Please, Check 'Remember Me' Before Login!!";
            return;
        }

        document.querySelector("form").submit();
    });
}



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
