document.getElementById('loginForm').addEventListener('submit', function(event) {
    let isValid = true;
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const emailError = document.getElementById('emailError');
    const passwordError = document.getElementById('passwordError');
    const loginBtn = document.getElementById('loginBtn');

    // Reset errors
    email.classList.remove('is-invalid');
    password.classList.remove('is-invalid');
    emailError.textContent = '';
    passwordError.textContent = '';

    // Validate email
    if (!email.value) {
        email.classList.add('is-invalid');
        emailError.textContent = 'Email wajib diisi.';
        isValid = false;
    } else if (!/\S+@\S+\.\S+/.test(email.value)) {
        email.classList.add('is-invalid');
        emailError.textContent = 'Format email tidak valid.';
        isValid = false;
    }

    // Validate password
    if (!password.value) {
        password.classList.add('is-invalid');
        passwordError.textContent = 'Password wajib diisi.';
        isValid = false;
    }

    if (!isValid) {
        event.preventDefault();
    } else {
        // Show loading state
        loginBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Masuk...';
        loginBtn.disabled = true;
    }
});

// Add focus effects
document.querySelectorAll('.form-control').forEach(input => {
    input.addEventListener('focus', function() {
        this.parentElement.classList.add('focused');
    });
    input.addEventListener('blur', function() {
        this.parentElement.classList.remove('focused');
    });
});