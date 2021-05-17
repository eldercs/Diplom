var sliderLink1 = document.querySelector(".js-control-prev");
var sliderLink2 = document.querySelector(".js-control-next");
var sliderLink3 = document.querySelector(".js-control-prev2");
var sliderLink4 = document.querySelector(".js-control-next2");
var slider1 = document.querySelector(".l0");
var slider2 = document.querySelector(".l1");
var slider3 = document.querySelector(".l2");
var toggler1 = document.querySelector(".js-toggler-1");
var toggler2 = document.querySelector(".js-toggler-2"); 
var toggler3 = document.querySelector(".js-toggler-3"); 

var i = 1;

sliderLink1.addEventListener("click", function (evt) {
  evt.preventDefault();
  if(i == 2){
    slider1.classList.add("slide-show");
    slider2.classList.remove("slide-show");
    slider3.classList.remove("slide-show");
    i--;
    toggler1.classList.add("slider-toggler-active");
    toggler2.classList.remove("slider-toggler-active");
    toggler3.classList.remove("slider-toggler-active");
  }
    else if(i == 3){
    slider1.classList.remove("slide-show");
    slider2.classList.add("slide-show");
    slider3.classList.remove("slide-show");
    i--;
    toggler1.classList.remove("slider-toggler-active");
    toggler2.classList.add("slider-toggler-active");
    toggler3.classList.remove("slider-toggler-active");
  }  
});

sliderLink2.addEventListener("click", function (evt) {
  evt.preventDefault();
  if(i == 1){
  slider2.classList.add("slide-show");
  slider1.classList.remove("slide-show");
  slider3.classList.remove("slide-show");
  toggler2.classList.add("slider-toggler-active");
  toggler1.classList.remove("slider-toggler-active");
  toggler3.classList.remove("slider-toggler-active");
  i++;
  }
  else if(i == 2){
  slider2.classList.remove("slide-show");
  slider3.classList.add("slide-show");
  slider1.classList.remove("slide-show");
  i++;
  toggler1.classList.remove("slider-toggler-active");
  toggler2.classList.remove("slider-toggler-active");
  toggler3.classList.add("slider-toggler-active");
  }
});

sliderLink3.addEventListener("click", function (evt) {
  evt.preventDefault();
  if(i == 2){
    slider1.classList.add("slide-show");
    slider2.classList.remove("slide-show");
    i--;
    toggler1.classList.add("slider-toggler-active");
    toggler2.classList.remove("slider-toggler-active");
  }
});

sliderLink4.addEventListener("click", function (evt) {
  evt.preventDefault();
  if(i == 1){
  slider2.classList.add("slide-show");
  slider1.classList.remove("slide-show");
  toggler2.classList.add("slider-toggler-active");
  toggler1.classList.remove("slider-toggler-active");
  i++;
  }
});