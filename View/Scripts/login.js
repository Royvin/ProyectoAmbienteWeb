document.addEventListener('DOMContentLoaded', function() {
    // Login button (for login page)
    const loginButton = document.getElementById('loginBtn');
    if (loginButton) {
        loginButton.addEventListener('click', function(e) {
            e.preventDefault();
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            localStorage.setItem('isLoggedIn', 'true');
            window.location.href = 'home.php';
 /*           if (username === '' && password === 'password') {
                localStorage.setItem('isLoggedIn', 'true');
                window.location.href = 'home.php';
            } else {
                alert('Credenciales incorrectas');
            }*/
        });
    }

    // Check login status on page load
    function checkLoginStatus() {
        const isLoggedIn = localStorage.getItem('isLoggedIn');
        // Solo verificar el estado de login si NO estamos en la página de login
        if (!window.location.pathname.includes('login.php') && isLoggedIn !== 'true') {
            window.location.href = '/ProyectoAmbienteWeb/View/Login/login.php';
        }
    }
    checkLoginStatus();

    // Logout function
    function logout() {
        localStorage.removeItem('isLoggedIn');
        window.location.href = '/ProyectoAmbienteWeb/View/Login/login.php';
    }

    // Attach logout to logout button if it exists
    const logoutButton = document.getElementById('logoutBtn');
    if (logoutButton) {
        logoutButton.addEventListener('click', logout);
    }
});