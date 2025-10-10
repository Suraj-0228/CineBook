// Registration Validation Script
document.addEventListener('DOMContentLoaded', () => {
    const fullname = document.getElementById('fullname');
    const email = document.getElementById('email');
    const username = document.getElementById('username');
    const password = document.getElementById('password');
    const confirm_password = document.getElementById('confirm_password');
    const terms = document.getElementById('terms');
    const register_btn = document.getElementById('register_btn');

    register_btn.addEventListener('click', (e) => {
        // Prevent form from submitting before validation
        e.preventDefault();

        // Trim spaces
        const fullNameValue = fullname.value.trim();
        const emailValue = email.value.trim();
        const usernameValue = username.value.trim();
        const passwordValue = password.value.trim();
        const confirmPasswordValue = confirm_password.value.trim();

        // Check if all fields are filled
        if (
            fullNameValue === '' ||
            emailValue === '' ||
            usernameValue === '' ||
            passwordValue === '' ||
            confirmPasswordValue === ''
        ) {
            alert('ERROR: Fields are Empty!!!');
            return;
        }

        // Validate Email Format
        if (!emailValue.includes('@') || !emailValue.endsWith('.com')) {
            alert('ERROR: Email Address (must Contain @ and .com)');
            return;
        }

        // Validate Password Range
        const minLength = 6;
        const maxLength = 12;

        if (passwordValue.length < minLength || passwordValue.length > maxLength) {
            alert(`ERROR: Password must be between ${minLength} and ${maxLength} characters!`);
            return;
        }

        // Check Password Match
        if (passwordValue !== confirmPasswordValue) {
            alert('ERROR: Password and Confirm Password do not Match!');
            return;
        }

        // Check Terms and Conditions
        if (!terms.checked) {
            alert('ERROR: You must Agree to the Terms and Conditions!!');
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