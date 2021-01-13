var images = document.querySelectorAll('.slidshow-img');
var delay = 3000;
var currentImageCounter = 0;


// images[currentImageCounter].style.opacity = 'block';
images[currentImageCounter].style.opacity = 1;

setInterval(nextImg,delay);

function nextImg()
{
    // images[currentImageCounter].style.opacity= 'none';
    images[currentImageCounter].style.opacity= 0;
    currentImageCounter = (currentImageCounter + 1) % images.length;
    // images[currentImageCounter].style.opacity= 'block';
    images[currentImageCounter].style.opacity= 1;
}