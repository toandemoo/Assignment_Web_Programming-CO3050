let captchaCode;

// Function to generate random CAPTCHA
function generateCaptcha() {
    const characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    captchaCode = "";
    for (let i = 0; i < 6; i++) {
        captchaCode += characters.charAt(Math.floor(Math.random() * characters.length));
    }
    document.getElementById("captcha").textContent = captchaCode;
}

// Function to validate the entered CAPTCHA
function validateCaptcha() {
    const userInput = document.getElementById("captchaInput").value;
    const result = document.getElementById("result");

    if (userInput === captchaCode) {
        result.textContent = "CAPTCHA is correct!";
        result.style.color = "green";
    } else {
        result.textContent = "CAPTCHA is incorrect. Please try again.";
        result.style.color = "red";
    }
}

// Generate initial CAPTCHA on page load
window.onload = generateCaptcha;
