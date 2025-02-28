# Tasty Bites Kitchen - Nepalese Food Ordering Online

## Monash University - FIT3047 - S1 2024 - Team009 - Arasaka

## About the Project

**Website**: [TastyBitesKitchen](https://tastybites.u24s1009.iedev.org/)

Tasty Bites Kitchen is a Nepalese food ordering web application built using CakePHP, HTML, CSS, JavaScript, and PHP. Users can browse the menu, place orders, and make payments online. The project integrates:

- **Stripe** for secure payment processing.
- **SB Admin 2 Template** for the admin dashboard UI.
- **ContentBlocks Plugin** for managing dynamic content.

## Features

✅ Browse menu items  
✅ Add items to cart & place orders online  
✅ Secure payment processing with Stripe  
✅ Admin dashboard for managing orders  
✅ Dynamic content management with ContentBlocks  

### Admin & Staff Login Credentials (For Testing)

- **Admin Login**
  - Email: `admin@tastybites.com`
  - Password: `tastybites123`

- **Staff Login**
  - Email: `staff@tastybites.com`
  - Password: `tastybites123`

- **Test Email for Forms**: `admin@tastybites.u24s1009.iedev.org`

- **Test Credit Card (Stripe Sandbox Mode)**:
  - Card Number: `4000 0566 5566 5556`
  - Expiration Date: `12/34`
  - CVC: `123`

### Technologies Used

- **Framework**: [CakePHP 5.0.1](https://book.cakephp.org/5/en/installation.html)
- **Dependency Manager**: [Composer 2.7.2](https://getcomposer.org/download/)
- **Hosting**: cPanel
- **Database**: MySQL (Managed via PHPMyAdmin)
- **Version Control**: Git & GitHub Desktop
- **Project Management**: Trello
- **Development Tools**: PHPStorm & Visual Studio Code

## Installation Guide

### 1. Cloning the Repository

To clone this repository to your local machine, follow these steps:

1. Open your terminal or command prompt.
2. Navigate to the directory where you want to clone the repository.
3. Run the following command:
   ```bash
   git clone https://github.com/TienNguyenTech/TastyBites-food-ordering-website.git
   ```
4. Navigate into the cloned directory:
   ```bash
   cd TastyBites-food-ordering-website
   ```
5. You now have a local copy of the repository.

### 2. Install Dependencies

```bash
composer install
```

```bash
composer update
```
- Note: Sometimes the website got 'Failed to open stream: No such file or directory' error. You must run `composer update` again.

### 3. Database Setup

- Create a MySQL database including name, username and password. 
- Import the schema `fit3048_project` into the database.
- Update the `Datasourse` in your `config/app_local.php` with your database name, username and password.

### 4. Configure Stripe

- Sign up for a [Stripe account](https://stripe.com).
- Retrieve your API keys from the **Developers** section.
- Set the Stripe API keys in `config/app.php`.

### 5. Start the Development Server

```bash
bin/cake server
```
- Use 'CTRL-C' to exit.

### 6. Access the Application

Open your web browser and go to:

🔗 [http://localhost:8765](http://localhost:8765)

## Usage Guide

### As a User:
- Browse the menu and add items to the cart.
- Checkout and securely pay using Stripe.

### As an Admin:
- Manage orders through the admin dashboard.

## Contributing

### How to Contribute

#### Using Command Line:

1. Fork the repository.
2. Create a new branch:
   ```bash
   git checkout -b feature-name
   ```
3. Commit your changes:
   ```bash
   git commit -m 'Add new feature'
   ```
4. Push to the branch:
   ```bash
   git push origin feature-name
   ```
5. Open a pull request.

#### Using GitHub Desktop:

1. Add the repository.
2. Fetch the latest changes from `main`.
3. Edit in PHPStorm or VS Code.
4. Add a commit message like `'Add new feature'`.
5. Click the **Commit** button.
6. Push to `main`.

## License

This project is licensed under the [MIT License](https://en.wikipedia.org/wiki/MIT_License).

## Acknowledgements

- [SB Admin 2 Template](https://startbootstrap.com/theme/sb-admin-2)
- [Stripe](https://stripe.com)
- [CakePHP](https://cakephp.org)

## Copyright

© 2024 Tasty Bites Kitchen. All rights reserved.
