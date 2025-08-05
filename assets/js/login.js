const username = document.getElementById('username');
const password = document.getElementById('password');
const login = document.getElementById('login_btn');

login.addEventListener('click', () => {
    if (username.value.trim === '' || password.value.trim() === '') {
        alert('ERROR: Please, Fill All the Fields Properly!!!');
        return;
    }
})
