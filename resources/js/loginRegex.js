loginForm.querySelector('#loginEmail').addEventListener('input', function() {
    validateEmail(this);
});

loginForm.querySelector('#loginPassword').addEventListener('input', function() {
    validatePassword(this);
});


const validateInput = function(inputElement, regex, errorMessage, messageElementId) {
    let small = document.getElementById(messageElementId);

    if (regex.test(inputElement.value)) {
        small.innerHTML = "<b>This is a success </b>";
        small.classList.remove("text-red-500");
        small.classList.add("text-green-500");
    } else {
        small.innerHTML = errorMessage;
        small.classList.remove("text-green-500");
        small.classList.add("text-red-500");
    }
}

const validateEmail = function(inputElement) {
    validateInput(
        inputElement,
        /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,}$/,
        "<b>Email non valide</b>",
        "emailValidationMessage"
    );
};

const validatePassword = function(inputElement) {
    validateInput(
        inputElement,
        /^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d!@#$%^&*()_+]{8,20}$/,
        "<b>Mot de passe non valide, veuillez saisir au moins 8 caractères</b>",
        "passwordValidationMessage"
    );
};

