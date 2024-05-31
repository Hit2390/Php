document.addEventListener('DOMContentLoaded', () => {
    // Add event listeners to remove error messages on focus out
    document.getElementById('inputEmail').addEventListener('focusout', validateEmail);
    document.getElementById('inputPassword').addEventListener('focusout', validatePassword);
});

function LoginValidation() {
    // Clear previous error messages
    clearErrors();

    let isValid = true;

    // Validate all fields
    isValid &= validateEmail();
    isValid &= validatePassword();

    // If all validations pass, allow form submission
    return !!isValid;
}

function clearErrors() {
    document.getElementById('inputEmailError').innerText = '';
    document.getElementById('inputPasswordError').innerText = '';
}

function validateEmail() {
    const email = document.getElementById('inputEmail').value;

    // Validate email (only gmail and yahoo.com)
    const emailRegex = /^[a-zA-Z0-9._%+-]+@(gmail|yahoo)\.com$/;
    if (!emailRegex.test(email)) {
        document.getElementById('inputEmailError').innerText = "Invalid Email Address";
        return false;
    }
    document.getElementById('inputEmailError').innerText = '';
    return true;
}

function validatePassword() {
    const password = document.getElementById('inputPassword').value;

    // Validate password (Uppercase, lowercase, number and special character allow only @ or #)
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#])[A-Za-z\d@#]{8,}$/;
    if (!passwordRegex.test(password)) {
        document.getElementById('inputPasswordError').innerText = "Password must be at least 8 characters long and include an uppercase letter, a lowercase letter, a number, and a special character (@ or #).";
        return false;
    }
    document.getElementById('inputPasswordError').innerText = '';
    return true;
}
