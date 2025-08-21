const username = document.getElementById('username');
const password = document.getElementById('password');
const login = document.getElementById('login_btn');

login.addEventListener('click', () => {
    if (username.value.trim === '' || password.value.trim() === '') {
        alert('ERROR: Please, Fill All the Fields Properly!!!');
        return;
    }
})

// Show Password
document.getElementById("togglePassword").addEventListener("click", function () {
    const pwd = document.getElementById("password");
    const eye = this.querySelector("i");

    // Toggle password visibility
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