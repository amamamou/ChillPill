document.addEventListener('DOMContentLoaded', function() {
    const loginSection = document.querySelector('.login-section');
    const signupSection = document.querySelector('.signup-section');
    const loginLink = document.getElementById('login-link');
    const signupLink = document.getElementById('signup-link');

    function toggleSections(event) {
        event.preventDefault();
        loginSection.classList.toggle('hide-section');
        signupSection.classList.toggle('hide-section');
    }

    loginLink.addEventListener('click', toggleSections);
    signupLink.addEventListener('click', toggleSections);
});
