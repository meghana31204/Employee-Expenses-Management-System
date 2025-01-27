document.addEventListener("DOMContentLoaded", () => {
    // Dynamic Greeting Message
    document.querySelector(".center h1").textContent = 
        new Date().getHours() < 12 ? "Good Morning, Admin" :
        new Date().getHours() < 18 ? "Good Afternoon, Admin" : 
        "Good Evening, Admin";

    // Slideshow for Announcements
    const slides = document.querySelectorAll(".slideshow .announcement");
    let currentSlideIndex = 0;

    setInterval(() => {
        slides.forEach((slide, i) => slide.style.display = i === currentSlideIndex ? "block" : "none");
        currentSlideIndex = (currentSlideIndex + 1) % slides.length;
    }, 5000);

    // Initial display
    slides.forEach((slide, i) => slide.style.display = i === currentSlideIndex ? "block" : "none");
});
