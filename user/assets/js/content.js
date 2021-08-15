let signup = document.getElementById('signUp');
window.onclick = function signup(event) {
    if (event.target == signup) {
        signup.style.display = "none";
    }
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

upbutton = document.getElementById("upBtn");
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