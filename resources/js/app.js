document.addEventListener('DOMContentLoaded', () => {
    const togglePasswordButton = document.querySelector('#togglePassword');
    const passwordField = document.querySelector('#password');

    const toggleConfirmPasswordButton = document.querySelector('#toggleConfirmPassword');
    const confirmPasswordField = document.querySelector('#password_confirmation');

    if (togglePasswordButton && passwordField) {
        togglePasswordButton.addEventListener('click', () => {
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;
            togglePasswordButton.textContent = type === 'password' ? 'Zobraziť' : 'Skryť';
        });
    }

    if (toggleConfirmPasswordButton && confirmPasswordField) {
        toggleConfirmPasswordButton.addEventListener('click', () => {
            const type = confirmPasswordField.type === 'password' ? 'text' : 'password';
            confirmPasswordField.type = type;
            toggleConfirmPasswordButton.textContent = type === 'password' ? 'Zobraziť' : 'Skryť';
        });
    }
});
