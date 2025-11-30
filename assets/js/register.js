// Registration Validation Script
document.addEventListener('DOMContentLoaded', () => {
    const fullname = document.getElementById('fullname');
    const email = document.getElementById('email');
    const username = document.getElementById('username');
    const password = document.getElementById('password');
    const confirm_password = document.getElementById('confirm_password');
    const terms = document.getElementById('terms');
    const register_btn = document.getElementById('register_btn');
    const error_msg = document.getElementById('error_msg');

    register_btn.addEventListener('click', (e) => {
        // Prevent form from submitting before validation
        e.preventDefault();

        // Trim spaces
        const fullNameValue = fullname.value.trim();
        const emailValue = email.value.trim();
        const usernameValue = username.value.trim();
        const passwordValue = password.value.trim();
        const confirmPasswordValue = confirm_password.value.trim();

        // Clear previous error message
        error_msg.textContent = '';

        // Check if all fields are filled
        if (
            fullNameValue === '' ||
            emailValue === '' ||
            usernameValue === '' ||
            passwordValue === '' ||
            confirmPasswordValue === ''
        ) {
            error_msg.textContent = "ERROR: Fields Cannot be Empty!!";
            return;
        }

        // Validate Email Format
        if (!emailValue.includes('@') || !emailValue.endsWith('.com')) {
            error_msg.textContent = "ERROR: Email Address (must Contain @ and .com)";
            return;
        }

        // Validate Password Range
        const minLength = 6;
        const maxLength = 15;

        if (passwordValue.length < minLength || passwordValue.length > maxLength) {
            error_msg.textContent = `ERROR: Password must be between ${minLength} and ${maxLength} characters!!`;
            return;
        }

        // Check Password Match
        if (passwordValue !== confirmPasswordValue) {
            error_msg.textContent = "ERROR: Password and Confirm Password does not Matched!!";
            return;
        }

        // Check Terms and Conditions
        if (!terms.checked) {
            error_msg.textContent = "ERROR: You must Agree to Terms and Conditions!!";
            return;
        }

        document.querySelector('form').submit(); // Submit the form to PHP
    });
});

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