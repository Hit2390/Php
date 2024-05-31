document.addEventListener('DOMContentLoaded', () => {
    // Add event listeners to remove error messages on focus out
    document.getElementById('inputName').addEventListener('focusout', validateName);
    document.getElementById('inputEmail').addEventListener('focusout', validateEmail);
    document.getElementById('inputMobileNumber').addEventListener('focusout', validateMobileNumber);
    document.getElementById('inputPassword').addEventListener('focusout', validatePassword);
    document.getElementById('inputConfirmPassword').addEventListener('focusout', validateConfirmPassword);
    document.getElementById('inputDepartment').addEventListener('focusout', validateDepartment);
    document.getElementById('inputAddress').addEventListener('focusout', validateAddress);
    document.querySelector('input[name="inputTerms"]').addEventListener('focusout', validateTerms);
});

function RegistrationValidation() {
    // Clear previous error messages
    clearErrors();

    let isValid = true;

    // Validate all fields and check for null
    isValid &= validateName();
    isValid &= validateEmail();
    isValid &= validateMobileNumber();
    isValid &= validatePassword();
    isValid &= validateConfirmPassword();
    isValid &= validateDepartment();
    isValid &= validateAddress();
    isValid &= validateTerms();

    // If all validations pass, allow form submission
    return !!isValid;
}

function clearErrors() {
    document.getElementById('inputNameError').innerText = '';
    document.getElementById('inputEmailError').innerText = '';
    document.getElementById('inputMobileNumberError').innerText = '';
    document.getElementById('inputPasswordError').innerText = '';
    document.getElementById('inputConfirmPasswordError').innerText = '';
    document.getElementById('inputDepartmentError').innerText = '';
    document.getElementById('inputAddressError').innerText = '';
    document.getElementById('inputTermsError').innerText = '';
}

function validateName() {
    const name = document.getElementById('inputName').value;

    // Validate name (no digits and min length 2)
    const nameRegex = /^[A-Za-z\s]{2,}$/;
    if (!name || !nameRegex.test(name)) {
        document.getElementById('inputNameError').innerText = "Name must be at least 2 characters long and cannot contain digits.";
        return false;
    }
    document.getElementById('inputNameError').innerText = '';
    return true;
}

function validateEmail() {
    const email = document.getElementById('inputEmail').value;

    // Validate email (only gmail and yahoo.com)
    const emailRegex = /^[a-zA-Z0-9._%+-]+@(gmail|yahoo)\.com$/;
    if (!email || !emailRegex.test(email)) {
        document.getElementById('inputEmailError').innerText = "Email must be a valid gmail.com or yahoo.com address.";
        return false;
    }
    document.getElementById('inputEmailError').innerText = '';
    return true;
}

function validateMobileNumber() {
    const mobileNumber = document.getElementById('inputMobileNumber').value;

    // Validate mobile number (10 digits)
    const mobileNumberRegex = /^[0-9]{10}$/;
    if (!mobileNumber || !mobileNumberRegex.test(mobileNumber)) {
        document.getElementById('inputMobileNumberError').innerText = "Mobile number must be exactly 10 digits.";
        return false;
    }
    document.getElementById('inputMobileNumberError').innerText = '';
    return true;
}

function validatePassword() {
    const password = document.getElementById('inputPassword').value;

    // Validate password (Uppercase, lowercase, number and special character allow only @ or #)
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#])[A-Za-z\d@#]{8,}$/;
    if (!password || !passwordRegex.test(password)) {
        document.getElementById('inputPasswordError').innerText = "Password must be at least 8 characters long and include an uppercase letter, a lowercase letter, a number, and a special character (@ or #).";
        return false;
    }
    document.getElementById('inputPasswordError').innerText = '';
    return true;
}

function validateConfirmPassword() {
    const password = document.getElementById('inputPassword').value;
    const confirmPassword = document.getElementById('inputConfirmPassword').value;
    if (!confirmPassword || password !== confirmPassword) {
        document.getElementById('inputConfirmPasswordError').innerText = "Passwords do not match.";
        return false;
    }
    document.getElementById('inputConfirmPasswordError').innerText = '';
    return true;
}

function validateDepartment() {
    const department = document.getElementById('inputDepartment').value;
    console.log(department);
    if (!department || department === "Select a Department") {
        document.getElementById('inputDepartmentError').innerText = "Please select a department.";
        return false;
    }
    document.getElementById('inputDepartmentError').innerText = '';
    return true;
}

function validateAddress() {
    const address = document.getElementById('inputAddress').value;
console.log(address);
    // The valid address is not null, and the address length is between 10 and 500 characters.
    if (!address || address.trim() === "") {
        document.getElementById('inputAddressError').innerText = "Address cannot be empty.";
        return false;
    }
    if (address.length < 10 || address.length > 500) {
        document.getElementById('inputAddressError').innerText = "Address length must be between 10 and 500 characters.";
        return false;
    }
    document.getElementById('inputAddressError').innerText = '';
    return true;
}

function validateTerms() {
    const termsAccepted = document.querySelector('input[name="inputTerms"]').checked;
    if (!termsAccepted) {
        document.getElementById('inputTermsError').innerText = "You must accept the terms and conditions.";
        return false;
    }
    document.getElementById('inputTermsError').innerText = '';
    return true;
}
