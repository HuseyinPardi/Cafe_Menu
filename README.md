# ☕ Cafe Menu

Cafe Menu, Laravel + Vue.js kullanılarak geliştirilmiş, çoklu kullanıcı tipi destekleyen bir restoran yönetim sistemidir.  
Admin paneli ile sistem genel yönetimi yapılabilirken, her kafe için özel yönetim ekranları da mevcuttur.

## 🚀 Özellikler

- 👤 Admin Panel
  - Kafeleri yönetme
  - Menü öğeleri oluşturma ve düzenleme
  - Kullanıcı rolleri ve izin yönetimi

- 🏪 Kafe Paneli
  - Kafe özel giriş ekranı
  - Kendi menüsünü düzenleme
  - Sipariş ve içerik kontrolü

- 🔐 Yetkilendirme Sistemi
  - Kullanıcı rolleri: `admin`, `cafe`
  - Giriş ve yönlendirme kontrolü

## ⚙️ Kullanılan Teknolojiler

- Laravel (Backend)
- Vue.js 3 (Frontend)
- Vite (Hot Reload)
- Axios (API istekleri)
- MySQL (Veritabanı)
- Laragon (Geliştirme ortamı)
- Vscode (Geliştirme Ortamı)

## 📸 Görseller

![Ekran Alıntısı](https://github.com/user-attachments/assets/9a9f584b-1229-4dc9-9eec-64f9fe6804b9)

![Ekran Alıntısı](https://github.com/user-attachments/assets/c0f568eb-d42a-4456-a786-acaa008a065e)


## 🛠 Kurulum

```bash
git clone https://github.com/HuseyinPardi/Cafe_Menu.git
cd Cafe_Menu
composer install
php artisan serve
