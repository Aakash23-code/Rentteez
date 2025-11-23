# **Rentteez — Modern Rental Ecosystem (MVP)**  
*Own Less. Live More.*

![Status](https://img.shields.io/badge/status-in%20development-orange)
![Build](https://img.shields.io/badge/build-PHP%208%20%7C%20MySQL%20%7C%20HTML%2FCSS%2FJS-blue)
![License](https://img.shields.io/badge/license-Rentteez%20Private%20Limited-green)
![Contributions](https://img.shields.io/badge/contributions-welcome-brightgreen)

---

## 📌 **Overview**
**Rentteez** is a modern rental ecosystem offering furniture, appliances, electronics, gadgets, fitness products, and more through a flexible and affordable rental model.  
Our mission is simple:  
### **✨ Own Less. Live More.**

This repo contains the **MVP development structure**, including backend (PHP), frontend (HTML/CSS/JS), database schema (MySQL), API layer, SMTP setup, and payment integration.

---

## 🚀 **Features (MVP)**

### **🧑‍💼 Customer**
- OTP login / email login  
- KYC upload  
- Browse catalog, categories, search & filters  
- Product detail view  
- Cart → Checkout → Razorpay Payment  
- Live order tracking timeline  
- Extensions, returns, issue reporting  
- Ratings & reviews  

### **🛍 Vendor / Product Owners**
- Vendor KYC  
- Add listings (images, rent price, deposit, availability)  
- Manage items & earnings  
- Withdraw request  

### **🚚 Delivery / Driver**
- Daily assigned deliveries  
- Pickup / drop flow with photos  
- Customer OTP verification  
- Route details  

### **🛠 Admin**
- Dashboard with KPIs  
- User & vendor verification  
- Listing moderation  
- Delivery assignment  
- Refund / deposit settlement  
- Dispute management  
- Coupons & promotions  

---

## 🛠 **Tech Stack**

| Layer      | Technology |
|------------|------------|
| Frontend   | HTML, CSS, JavaScript, Tailwind / Bootstrap |
| Backend    | Core PHP 8 |
| Database   | MySQL 8 |
| Payments   | Razorpay |
| Auth       | JWT |
| Emails     | SMTP (PHPMailer) |
| Storage    | AWS S3 / Hostinger |
| Deployment | Hostinger / VPS |

---

## 📁 **Project Structure**

```
rentteez/
├── api/
│   ├── index.php
│   ├── router.php
│   ├── controllers/
│   │     ├── AuthController.php
│   │     ├── UserController.php
│   ├── models/
│   ├── services/
│   ├── lib/
│   ├── middleware/
│
├── config/
│   ├── config.php
│   ├── env.php
│
├── database/
│   ├── rentteez_schema.sql
│
├── public/
│   ├── index.html
│   ├── assets/
│
├── docs/
│   ├── SRS_detailed.md
│   ├── API_REFERENCE.md
│
└── README.md
```

---

## 🔐 **Environment Setup (`config/env.php`)**

```php
<?php
return [
  'DB_HOST' => 'localhost',
  'DB_NAME' => 'rentteez',
  'DB_USER' => 'root',
  'DB_PASS' => '',

  'JWT_SECRET' => 'your_secret_key',

  'SMTP_HOST' => 'smtp.gmail.com',
  'SMTP_PORT' => 587,
  'SMTP_USER' => 'your-email@gmail.com',
  'SMTP_PASS' => 'your-smtp-password',

  'RAZORPAY_KEY' => 'rzp_test_xxxxx',
  'RAZORPAY_SECRET' => 'xxxxxxx',
];
```

---

## 💻 **Local Setup Instructions**

Clone:
```bash
git clone https://github.com/yourusername/rentteez.git
cd rentteez
```

Import DB:
```bash
mysql -u root -p rentteez < database/rentteez_schema.sql
```

Start development server:
```bash
php -S localhost:8000 -t public
```

---

## 📈 **Roadmap (Nov–Dec 2025)**

- ✔ DB Schema  
- ✔ API scaffold (Auth + User)  
- 🔄 Vendor Module  
- 🔄 Booking Engine  
- 🔄 Payments + Refunds  
- 🔄 Delivery Workflow  
- 🔄 Admin Dashboard  
- 🚀 **Beta Release – 20 Dec 2025**  

---

## 🤝 **Contribution Guide**

1. Create a new branch  
   ```bash
   git checkout -b feature-name
   ```
2. Commit your changes  
   ```bash
   git commit -m "Added feature"
   ```
3. Push  
   ```bash
   git push origin feature-name
   ```
4. Open a Pull Request  

---

## 📜 **License**

**© 2025 Rentteez Private Limited. All Rights Reserved.**  
Unauthorized copying or distribution is strictly prohibited.

---

## ⭐ **For Interview Reviewers**

This repo demonstrates:
- API-first backend design  
- Secure PHP + MySQL architecture  
- JWT authentication  
- Real-world SRS + DB modeling  
- Multi-role system design  
- Scalable structure for rental marketplace  

If you want API docs, Postman collection, or GitHub Project board, just ask! 🚀
