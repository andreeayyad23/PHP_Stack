# Tourism App - Full CRUD Operation 🌍📃

## Overview 🔄
The **Tourism App** is a PHP-based application demonstrating full CRUD (Create, Read, Update, Delete) operations. This project is designed to manage tourism-related data efficiently. It provides a simple and intuitive interface for performing database operations, making it ideal for educational purposes and small-scale implementations.

## Features ✨
- **Create:** Add new tourism-related entries (e.g., destinations, packages, or customer information). 🏖️
- **Read:** View and list all entries in the database with details. 🔍
- **Update:** Edit existing entries to keep data up-to-date. ✏️
- **Delete:** Remove unwanted or outdated entries from the database. ❌

## Technologies Used 💻
- **Backend:** PHP 🗓
- **Frontend:** HTML, CSS, JavaScript (optional for interactivity) 🎨
- **Database:** MySQL 📊
- **Tools:** XAMPP (or any PHP and MySQL server setup) 🔧

## Setup Instructions ⚙️

### Prerequisites ⚡
- Install [XAMPP](https://www.apachefriends.org/index.html) or any other local server environment.
- Clone the repository from GitHub.
- Ensure you have basic knowledge of PHP, MySQL, and CRUD operations.

### Installation Steps 🚀
1. **Clone the Repository** 🔧
   ```bash
   git clone https://github.com/andreeayyad23/PHP_Stack.git
   ```
2. **Navigate to the Project Directory** 🌐
   ```bash
   cd PHP_Stack/full_crud_operation
   ```
3. **Move Files to the Server Directory** 🏛
   Copy the `full_crud_operation` folder to your server's root directory. For XAMPP, move it to `htdocs`.

4. **Set Up the Database** 🏦
   - Open phpMyAdmin (http://localhost/phpmyadmin).
   - Create a new database, e.g., `tourism_app`.
   - Import the SQL file provided in the repository (`tourism_app.sql`):
     - Click on the database.
     - Go to the "Import" tab.
     - Choose the SQL file and click "Go."

5. **Configure Database Connection** 🔐
   - Open `db.php` or the relevant configuration file in the project.
   - Update the database connection credentials:
     ```php
     <?php
     $servername = "localhost";
     $username = "root"; // Default for XAMPP
     $password = "";    // Default for XAMPP
     $dbname = "tourism_app";
     ?>
     ```

6. **Run the Application** 🌐
   - Start the Apache and MySQL services in XAMPP.
   - Open your browser and navigate to:
     ```
     http://localhost/full_crud_operation
     ```

## File Structure 🌍
```plaintext
full_crud_operation/
├── css/                  # Stylesheets for the application
├── db.php                # Database connection file
├── index.php             # Homepage listing all entries
├── create.php            # Form to add new entries
├── update.php            # Form to edit existing entries
├── delete.php            # Logic to delete entries
├── tourism_app.sql       # Database schema and sample data
└── README.md             # Project documentation
```

## CRUD Functionalities 🔄

### Create ➕
- Navigate to the "Add New Entry" page (create.php).
- Fill in the required details and submit the form.
- The entry will be saved in the database and displayed on the homepage.

### Read 🔍
- The homepage (index.php) displays a table of all entries.
- Each entry includes options to update or delete.

### Update ✏️
- Click the "Edit" button next to an entry.
- Modify the details in the form and submit.
- The database will be updated with the new information.

### Delete ❌
- Click the "Delete" button next to an entry.
- Confirm the deletion.
- The entry will be removed from the database.

## Screenshots 🖼


## Future Enhancements 🌐
- Implement user authentication for better security.
- Add search and filter functionalities for easier data management.
- Enhance the UI using modern CSS frameworks like Bootstrap.
- Integrate an API for fetching live data about tourism destinations.

## License 🔒
This project is open-source and available under the [MIT License](LICENSE).

