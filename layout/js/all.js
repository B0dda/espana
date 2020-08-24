// Slider START
var slider = document.getElementsByClassName('slider');

function slideElement(e, items, m = 1) {
  maxItems = items.length;
  var sliderPosition = e.style.right;
  sliderPosition = parseInt(sliderPosition) + 100 * m;
  if (sliderPosition / 100 > 0) {
    sliderPosition = (maxItems - 1) * -100;
  } else if (sliderPosition / -100 > (maxItems - 1)) {
    sliderPosition = "0";
  }
  e.style.right = sliderPosition + "%";

}
for (let i = 0; i < slider.length; i++) {
  slider[i].style.position = 'absolute';
  slider[i].style.right = '0px';
  var parentSlider = slider[i].parentElement;
  var slides = slider[i].getElementsByClassName('slide');
  for (let j = 0; j < slides.length; j++) {
    var img = slides[j].getElementsByTagName('img')[0];
    var imageBack = document.createElement("img");
    imageBack.setAttribute('src', img.getAttribute('src'));
    imageBack.classList.add('image-back');
    slides[j].appendChild(imageBack);
  }
  var slideLeft = parentSlider.getElementsByClassName('left')[0];
  var slideRight = parentSlider.getElementsByClassName('right')[0];
  if (slider[i].hasAttribute('data-timer')) {
    var time = slider[i].getAttribute('data-timer');
    setInterval(function() {
      slideElement(slider[i], slides, -1);
    }, time);
  }
  slideLeft.addEventListener('click', function() {
    slideElement(slider[i], slides, -1);
  });
  slideRight.addEventListener('click', function() {
    slideElement(slider[i], slides, 1);
  });
  var imagePreview = parentSlider.getElementsByClassName('sec-img');
  if (imagePreview) {
    var imagePreviews = imagePreview[0].getElementsByTagName('img');
    for (let j = 0; j < imagePreviews.length; j++) {
      imagePreviews[j].addEventListener('click', function() {
        parentSlider.getElementsByClassName('slider')[0].style.right = -1 * j * 100 + "%";
      });
    }
  }
}

// Slider END