let slideIndex = 0;
showSlides();
function showSlides() {
    let i;
    let slides = document.getElementsByClassName("slideshow");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.display = "block";
    setTimeout(showSlides, 3000);
}

window.onscroll = function() {StickyFunction(), scrollFunction()};
let bar = document.getElementById("bar");
let sticky = bar.offsetTop;
function StickyFunction() {
    if (window.pageYOffset >= sticky) {
        bar.classList.add("sticky")
    } else {
        bar.classList.remove("sticky");
    }
}

let upbutton = document.getElementById("upBtn");
function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        upbutton.style.display = "block";
    } else {
        upbutton.style.display = "none";
    }
}
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

let signup = document.getElementById('signUp');
window.onclick = function signup(event) {
    if (event.target == signup) {
        signup.style.display = "none";
    }
}

let login = document.getElementById('login');
window.onclick = function login(event) {
    if (event.target == login) {
        login.style.display = "none";
    }
}

let feedback = document.getElementById('feedback');
window.onclick = function feedback(event) {
    if (event.target == feedback) {
        feedback.style.display = "none";
    }
}