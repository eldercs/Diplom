var sliderLink3 = document.querySelector(".js-control-prev2");
var sliderLink4 = document.querySelector(".js-control-next2");
var slider1 = document.querySelector(".l0");
var slider2 = document.querySelector(".l1");
var toggler1 = document.querySelector(".js-toggler-1");
var toggler2 = document.querySelector(".js-toggler-2"); 
  sliderLink3.addEventListener("click", function (evt) {
    evt.preventDefault();
    slider1.classList.add("slide-show");
    slider2.classList.remove("slide-show");
    toggler1.classList.add("slider-toggler-active");
    toggler2.classList.remove("slider-toggler-active");
  });
  
  sliderLink4.addEventListener("click", function (evt) {
    evt.preventDefault();
    slider2.classList.add("slide-show");
    slider1.classList.remove("slide-show");
    toggler2.classList.add("slider-toggler-active");
    toggler1.classList.remove("slider-toggler-active");
  });