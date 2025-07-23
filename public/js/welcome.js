document.addEventListener("DOMContentLoaded", function () {
    const container = document.querySelector(".container");
    const registerBtn = document.querySelector(".register-btn");
    const loginBtn = document.querySelector(".login-btn");

    registerBtn.addEventListener("click", () => {
        container.classList.add("active");
    });

    loginBtn.addEventListener("click", () => {
        container.classList.remove("active");
    });
});

document.documentElement.classList.toggle('dark');
document.addEventListener("DOMContentLoaded", function () {
    const toggleBox = document.querySelector(".toggle-box");
    const toggleLeft = document.querySelector(".toggle-left");
    const toggleRight = document.querySelector(".toggle-right");

    toggleLeft.addEventListener("click", () => {
        toggleBox.classList.add("active");
    });

    toggleRight.addEventListener("click", () => {
        toggleBox.classList.remove("active");
    });
});