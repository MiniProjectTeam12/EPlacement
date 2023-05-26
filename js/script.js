// toggle of navbar on mobile show hide-responsiveness
function show() {
    var sh = document.getElementById('s');
    var isTrue = sh.classList.toggle('fa-window-close');

    var ul = document.getElementById('ul');
    var nav = document.getElementById('navbar');
    var li = document.querySelector('li');
    const hvr = document.querySelector('.dropdown_menu');


    if (isTrue == true) {
        nav.style.display = "grid";
        nav.style.placeContent = "left";
        ul.style.display = "inline";
    }
    else {
        ul.style.display = "none";
    }

}

//   Navabar bg changes on scroll

window.addEventListener("scroll", function () {
    var navbar = document.getElementById("navbar");
    if (window.pageYOffset > 50) {
        navbar.classList.add("active");
    } else {
        navbar.classList.remove("active");
    }

});

window.addEventListener('scroll', reveal);

function reveal() {
    var reveals = document.querySelectorAll('.reveal');
    for (var i = 0; i < reveals.length; i++) {
        var windowheight = window.innerHeight;
        var revealtop = reveals[i].getBoundingClientRect().top;
        var revealpoint = 10;

        if(revealtop<windowheight-revealpoint){
            reveals[i].classList.add('active');
        }
        else{
            reveals[i].classList.remove('active');
        }
    }
}