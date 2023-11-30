# Event Management System

This is a web-based event management system developed using PHP, MySQL, CSS, and JavaScript. The system allows students to register for events and administrators to manage and approve registrations.

## Features

- **User Authentication:** Secure login system for students and administrators.
- **Event Registration:** Students can view and register for upcoming events.
- **Admin Dashboard:** Administrators can view and manage student registrations.
- **Email Notifications:** Automatic email confirmation upon successful registration.

## Technologies Used

- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP
- **Database:** MySQL
- **Email:** PHP Mailer

## Setup

1. Clone the repository:

    ```bash
    git clone https://github.com/your-username/event-management-system.git
    ```

2. Import the SQL schema from `database/schema.sql` into your MySQL database.

3. Configure the database connection in `config/config.php`.

4. Install dependencies:

    ```bash
    composer install
    ```

5. Set up your web server to point to the `public` directory.

6. Ensure proper file and folder permissions:

    ```bash
    chmod -R 755 storage
    ```

7. Access the application in your web browser.

## Usage

1. **Student Portal:**
    - Log in to the student portal to view upcoming events.
    - Register for events and receive confirmation emails.

2. **Admin Dashboard:**
    - Log in to the admin dashboard to manage student registrations.
    - Approve or cancel student registrations.

## Contributing

Contributions are welcome! Please follow the [contribution guidelines](CONTRIBUTING.md).

## License

This project is licensed under the [MIT License](LICENSE).

## Acknowledgments

- Thanks to [PHP Mailer](https://github.com/PHPMailer/PHPMailer) for email functionality.
- Special thanks to our contributors!

## Contact

For issues and inquiries, please contact [your-email@example.com](mailto:your-email@example.com).
