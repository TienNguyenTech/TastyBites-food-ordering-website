# Tasty Bites Kitchen Nepalese Food Ordering Online
## Monash University - FIT3047 - S1 2024 - Team009 - Arasaka

### Run Sheet/Access Instructions

- Link to website: [TastyBitesKitchen](https://tastybites.u24s1009.iedev.org/)
- Source code: [https://drive.google.com/drive/folders/1s2Hsf_50c0x-huRdoC37rN-jlEqqeqXi?usp=drive_link](https://drive.google.com/drive/folders/1s2Hsf_50c0x-huRdoC37rN-jlEqqeqXi?usp=drive_link)

#### Admin Login
- Email: admin@tastybites.com
- Password: tastybites123

#### Staff Login
- Email: staff@tastybites.com
- Password: tastybites123

#### Email for testing forms
- Email: admin@tastybites.u24s1009.iedev.org

#### Credit card number for testing payment form
- Card number: 4000 0566 5566 5556
- Expiration date: 12/34
- CVC: 123

We use Composer 2.7.2 [https://getcomposer.org/download/](https://getcomposer.org/download/)
We use CakePHP 5.0.1 [https://book.cakephp.org/5/en/installation.html](https://book.cakephp.org/5/en/installation.html)

#### Our PGP
[PGP](https://drive.google.com/drive/folders/1MycB56sLoiEeIzH2biT4pfbxDvyx7m9Z?usp=drive_link)

## About Us

Momos Food Ordering Online is a web application built with CakePHP, CSS, JavaScript, HTML, and PHP. It allows users to browse a menu, place orders, and make payments online. The project utilizes the Stripe plugin for payment processing and the SB Admin 2 template for the dashboard interface. ContentBlocks plugin is used for managing dynamic content. Additionally, we utilized cPanel for hosting, PHPMyAdmin for database management, referred to the CakePHP cookbook for guidance, and worked with PHPStorm and Visual Studio Code for development.

## Features

- Browse menu items
- Place orders online
- Secure payment processing with Stripe
- Admin dashboard for order management
- Dynamic content management with ContentBlocks

## Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/your/repository.git

2. **Install dependencies:**
   ```bash
   composer install

3. **Set up database:**
- Create a MySQL database.
- Copy config/app.default.php to config/app.php and update the database configuration.
- Run migrations to create database schema:
  ```bash
  bin/cake migrations migrate

4. **Configure Stripe:**
- Sign up for a Stripe account.
    Email: tiennguyen0802200239@gmail.com
    Password: 0802200239nT@
- Set your Stripe API keys in config/app.php.
- You can find your API secret keys and publishable keys by clicking on "Developers" link the top right Navigation bar.

2. **Start the development server:**
   ```bash
   bin/cake server

6. **Access the application:**
Open your web browser and navigate to http://localhost:8765.

## Usage

- As a user, you can:
* Browse the menu and add items to the cart.
* Proceed to checkout and make payments securely with Stripe.
- As an admin, you can:
* Manage orders through the admin dashboard.

## Contributing

Contributions are welcome! Please follow these steps:

1. **Fork the repository.**
2. **Create a new branch for your feature: git checkout -b feature-name.**
3. **Commit your changes: git commit -am 'Add new feature'.**
4. **Push to the branch: git push origin feature-name.**
5. **Submit a pull request.**

## License

This project is licensed under the MIT License.

## Acknowledgements

- SB Admin 2 template: [https://startbootstrap.com/theme/sb-admin-2](https://startbootstrap.com/theme/sb-admin-2)
- Stripe: [https://stripe.com](https://stripe.com)
- CakePHP: [https://cakephp.org](https://cakephp.org)

## Contact
For any inquiries, please contact IE Monash team [FIT-IEmonash@monash.edu](FIT-IEmonash@monash.edu)
or our team 009 members:

User Issues:
- Christina Doan: cdoa0004@student.monash.edu
- Surya Rao: srao0005@student.monash.edu
Tech & Security Issues:
- Ben Hetherington: bhet0004@student.monash.edu
- Tien Nhat Nguyen: tngu0394@student.monash.edu
- Yiming Huang: yhua0196@student.monash.edu
