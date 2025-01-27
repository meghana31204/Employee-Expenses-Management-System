// Slideshow for Announcements
let currentSlide = 0;
const slides = document.querySelectorAll(".slideshow .announcement");
setInterval(() => {
    slides.forEach((slide, i) => slide.style.display = i === currentSlide ? "block" : "none");
    currentSlide = (currentSlide + 1) % slides.length;
}, 5000);

// Update Progress Bar
document.querySelector(".progress").style.width = "50%";

// Apply Status Colors
document.querySelectorAll("td.status-approved").forEach(td => td.style.color = "green");
document.querySelectorAll("td.status-pending").forEach(td => td.style.color = "orange");
document.querySelectorAll("td.status-rejected").forEach(td => td.style.color = "red");
