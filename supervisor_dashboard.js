// JavaScript for Supervisor Dashboard - Greeting Message

document.addEventListener("DOMContentLoaded", function () {
    const welcomeText = document.querySelector(".welcome-text h1.welcome");
    const currentHour = new Date().getHours();
    let greeting = "Welcome Supervisor!";

    if (currentHour < 12) {
        greeting = "Good Morning, Supervisor!";
    } else if (currentHour < 18) {
        greeting = "Good Afternoon, Supervisor!";
    } else {
        greeting = "Good Evening, Supervisor!";
    }

    welcomeText.textContent = greeting;
});
