// assign the variable for them
var slide_temp, slides, dots, text_temp;

function gallery_slides() {
    slide_temp = 0;
    slides = document.getElementsByClassName("img_container");
    slides[slide_temp].style.opacity = 1;

    text_temp = document.querySelector(".text_container .text_form");
    text_temp.innerText = slides[slide_temp].querySelector(".text_form").innerText;

    //disable radio_btn if slide count is one
    if (slides.length < 2) {
        var radio_btns = document.querySelector(".arrow_prev,.arrow_next");
        radio_btns.style.display = "none";
        for (i = 0; i < radio_btn.length; i++) {
            radio_btn[i].style.display = "none";
        }
    }

    //add dots to scroll
    dots = [];
    var dots_container = document.getElementById("dots_container"),
        i;
    for (i = 0; i < slides.length; i++) {
        var dot = document.createElement("span");
        dot.classList.add("dots");
        dots_container.append(dot);
        dot.setAttribute("onclick", "sliding(" + i + ")");
        dots.push(dot);
    }
    dots[slide_temp].classList.add("active");
}
gallery_slides();

function push_slides(s) {
    sliding(slide_temp + s);
}

function sliding(n) {
    var i;
    var current, next;
    var sliding_class = {
        is_prev: "",
        is_next: ""
    };
    var sliding_text_class;
    // click left btn, then slide go left
    if (n > slide_temp) {
        if (n >= slides.length) { n = 0; }
        sliding_class.is_prev = "prev_slide_left";
        sliding_class.is_next = "next_slide_left";
        sliding_text_class = "slideTextFromTop";
        // click right btn, then slide go left
    } else if (n < slide_temp) {
        if (n < 0) { n = slides.length - 1; }
        sliding_class.is_prev = "prev_slide_right";
        sliding_class.is_next = "next_slide_right";
        sliding_text_class = "slideTextFromBottom";
    }
    // the img will display follow the button (left, right)
    if (n != slide_temp) {
        next = slides[n];
        current = slides[slide_temp];
        for (i = 0; i < slides.length; i++) {
            slides[i].className = "img_container";
            slides[i].style.opacity = 0;
            dots[i].classList.remove("active");
        }
        current.classList.add(sliding_class.is_prev);
        next.classList.add(sliding_class.is_next);
        dots[n].classList.add("active");
        slide_temp = n;
        // once the img move, the word that related to it will be moved too
        text_temp.style.display = "none";
        text_temp.className = "text_form " + sliding_text_class;
        text_temp.innerText = slides[n].querySelector(".text_form").innerText;
        text_temp.style.display = "block";
    }
}

// the speed the moving
// show the animation of galllery image automatically
// https://www.w3schools.com/jsref/met_win_setinterval.asp
var timer = null;

function slide_timer() {
    timer = setInterval(function() { push_slides(1) }, 3000);
}
slide_timer();