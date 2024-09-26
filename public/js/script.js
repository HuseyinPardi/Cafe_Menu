// Ürün resimlerini array formatında alıyoruz
let currentImageIndex = 0;

// "Sonraki" resme geçiş
document.getElementById("nextBtn").addEventListener("click", function () {
    currentImageIndex = (currentImageIndex + 1) % images.length; // Dizinin sonuna gelince başa döner
    document.getElementById("mainImage").src = images[currentImageIndex];
});

// "Önceki" resme geçiş
document.getElementById("prevBtn").addEventListener("click", function () {
    currentImageIndex = (currentImageIndex - 1 + images.length) % images.length; // Başa gelince sona döner
    document.getElementById("mainImage").src = images[currentImageIndex];
});
