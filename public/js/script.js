let currentImageIndex = 0;

document.getElementById("nextBtn").addEventListener("click", function () {
    currentImageIndex = (currentImageIndex + 1) % images.length;
    document.getElementById("mainImage").src = images[currentImageIndex];
});

document.getElementById("prevBtn").addEventListener("click", function () {
    currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
    document.getElementById("mainImage").src = images[currentImageIndex];
});
