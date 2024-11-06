# Dating Website on EC2

This project is a dating website hosted on an AWS EC2 instance using Ubuntu. The website is built with HTML, CSS, JavaScript, PHP, and MySQL. phpMyAdmin is also used to manage the database.

## Tech Stack

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL
- **Web Server**: Apache
- **Hosting**: AWS EC2 (Ubuntu)
- **Database Management**: phpMyAdmin

## Steps to Set Up

### 1. EC2 Instance Setup

1. **Create an EC2 Instance**:
   - Log in to your AWS Management Console.
   - Navigate to the EC2 Dashboard and click **Launch Instance**.
   - Choose **Ubuntu** as the operating system.
   - Choose instance type (t2.micro if you are using the free tier).
   - Set up the instance, configure security groups, and launch it.
   
2. **Connect to EC2 Instance**:
   - Connect to your EC2 instance using SSH. In your terminal, run:
     ```bash
     ssh -i "your-key.pem" ubuntu@your-ec2-public-ip
     ```

### 2. Install Apache Web Server

1. **Update the Package List**:
   ```bash
   sudo apt update

2. **Install Apache**:
   ```bash
   sudo apt install apache2

3. **Check Apache Installation**:
   Open a browser and navigate to your EC2 public IP. You should see the Apache default page.

### 3. Install PHP

**Install PHP and Required Extensions:**
  
    sudo apt install php libapache2-mod-php php-mysql
    Restart Apache:
    
    sudo systemctl restart apache2

### 4. Install MySQL Database
**Install MySQL:**

    sudo apt install mysql-server
    Secure MySQL Installation:
    
    sudo mysql_secure_installation
    Follow the prompts to set the root password and configure MySQL securely.
    
    Create MySQL Database and User:
    
    Log in to MySQL as root:

    sudo mysql -u root -p
    Create a new database for your website:
   sql
   
    CREATE DATABASE dating_app;
    Create a new user and grant privileges:
    CREATE USER 'appuser'@'localhost' IDENTIFIED BY 'chirag';
    GRANT ALL PRIVILEGES ON dating_app.* TO 'appuser'@'localhost';
    FLUSH PRIVILEGES;
    EXIT;
### 5. Install phpMyAdmin
**Install phpMyAdmin:**

    sudo apt install phpmyadmin
    Configure Apache to Work with phpMyAdmin:
    
    Select Apache2 when prompted for the web server during the phpMyAdmin installation.
    After installation, create a symlink to phpMyAdmin for Apache:
  
    sudo ln -s /usr/share/phpmyadmin /var/www/html/phpmyadmin
    Restart Apache:
    
    sudo systemctl restart apache2
    Access phpMyAdmin:
    Go to http://your-ec2-public-ip/phpmyadmin and log in using the appuser credentials to manage your database.

### 6. Website Files
**Create Website Files:**

    Upload your index.html, style.css, script.js, and submit_date.php files to /var/www/html/.
    Make sure your PHP files are connected to the MySQL database. For example, in submit_date.php, use the following code to connect to the database:
    php
    
    <?php
    $servername = "localhost";
    $username = "appuser";
    $password = "chirag";
    $dbname = "dating_app";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
    ?>
    Test the Website:
    
    Open your browser and go to http://your-ec2-public-ip. You should see your dating website.


### 7. Instructions for Deployment
**To deploy this project, follow these steps:**

Launch an EC2 instance with Ubuntu.
Install Apache, PHP, and MySQL as described above.
Set up the MySQL database (dating_app) and the appuser with appropriate privileges.
Clone this repository and upload the website files to /var/www/html/.
Configure the MySQL connection in your PHP files.
Install phpMyAdmin to manage the database.
Access the website from your EC2 public IP.
Screenshots
Here are some screenshots of the project:
![image](https://github.com/user-attachments/assets/1975c591-11a2-4d19-9f93-8b7d05939858)
![image](https://github.com/user-attachments/assets/fc702945-535b-4809-a3e8-24c37afb5acc)


