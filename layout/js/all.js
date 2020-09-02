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
  if (imagePreview.length > 0) {
    var imagePreviews = imagePreview[0].getElementsByTagName('img');
    for (let j = 0; j < imagePreviews.length; j++) {
      imagePreviews[j].addEventListener('click', function() {
        parentSlider.getElementsByClassName('slider')[0].style.right = -1 * j * 100 + "%";
      });
    }
  }
}

// Slider END

function passCheck(val) {
  var password = val;

  var uppercase = /[A-Z]/;
  var lowercase = /[a-z]/;
  var number = /[0-9]/;
  var specialChars = /[^\w]/;

  var lower = document.getElementById("lower");

  if (password.length >= 8) {
    lower.innerHTML = "";
    create.disabled = false;
    word();
  } else {
    lower.innerHTML = " *  كلمة المرور اقل من 8 حروف ";
    lower.style.color = "red";
    create.disabled = true;
  }
}

function passVer(val) {
  var rePassword = val;
  var password = document.getElementById('password').value;

  var rePass = document.getElementById("rePass");
  if (rePassword == password) {
    rePass.innerHTML = "";
    create.disabled = false;
    word();
  } else {
    rePass.innerHTML = "كلمة المرور غير مطابقة !";
    rePass.style.color = "red";
    create.disabled = true;
  }
}

function word() {
  var isFname = false;
  var isLname = false;
  var isEmail = false;

  var fname = document.getElementById('fname').value;
  var lname = document.getElementById('lname').value;
  var email = document.getElementById('email').value;

  var fnameError = document.getElementById("fnameError");
  var lnameError = document.getElementById("lnameError");
  var emailError = document.getElementById("emailError");
  var create = document.getElementById("create");
  if (!isFname) {
    if (fname.indexOf('script') >= 0 || fname.indexOf('php') >= 0 || fname.indexOf('alert') >= 0 || fname.indexOf('src') >= 0 || fname.indexOf('<') >= 0 || fname.indexOf('>') >= 0) {
      fnameError.innerHTML = "يجب ان لا يحتوي الاسم علي رموز او كلمات غير مرغوبه";
      fnameError.style.color = "red";
      create.disabled = true;
      // document.getElementById("name").style.border = "1px solid red";
      isFname = false;
    } else {
      isFname = true;
      fnameError.innerHTML = "";
      // document.getElementById("name").style.border = "1px solid #2386c8";
    }
  }

  if (!isLname) {
    if (lname.indexOf('script') >= 0 || lname.indexOf('php') >= 0 || lname.indexOf('alert') >= 0 || lname.indexOf('src') >= 0 || lname.indexOf('<') >= 0 || lname.indexOf('>') >= 0 || lname.indexOf(' ') >= 0) {
      lnameError.innerHTML = "يجب ان لا يحتوي الاسم علي مسافات او رموز او كلمات غير مرغوبه";
      lnameError.style.color = "red";
      create.disabled = true;
      isLname = false;
    } else {
      isLname = true;
      lnameError.innerHTML = "";
    }
  }

  if (!isEmail) {
    if (email.indexOf('script') >= 0 || email.indexOf('php') >= 0 || email.indexOf('alert') >= 0 || email.indexOf('src') >= 0 || email.indexOf('<') >= 0 || email.indexOf('>') >= 0 || email.indexOf(' ') >= 0 || email.indexOf('espana') >= 0) {
      emailError.innerHTML = "يجب ان لا يحتوي البريد علي مسافات او رموز او كلمات غير مرغوبه";
      emailError.style.color = "red";
      create.disabled = true;
      isEmail = false;
    } else {
      isEmail = true;
      emailError.innerHTML = "";
    }
  }

  if (isFname && isEmail && isLname) {
    create.disabled = false;
  }
}

function showDesc() {
  var Description = "<?php echo $product_info['description']; ?>";
  document.getElementById("btnn1").style.color = "#6381a8";
  document.getElementById("btnn2").style.color = "black";

  document.getElementById("btnn1").style.borderBottom = "1.5px solid #6381a8";
  document.getElementById("btnn2").style.border = "none";

  document.getElementById("descDesc").innerHTML = Description;
}

function showPrice() {
  var Payment = "<?php echo $product_info['paymentDetails']; ?>";
  document.getElementById("btnn2").style.color = "#6381a8";
  document.getElementById("btnn1").style.color = "black";

  document.getElementById("btnn2").style.borderBottom = "1.5px solid #6381a8";
  document.getElementById("btnn1").style.border = "none";

  document.getElementById("descDesc").innerHTML = Payment;
}