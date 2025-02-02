# Share&Care - Event Management System

## Installation Guide  

Follow the steps below to set up the project on your local machine.  

### Prerequisites  
- XAMPP (or any local server with PHP & MySQL)  
- Git installed on your system  

### Steps to Set Up  

1. **Navigate to the Project Directory**  
   - Go to `C:\xampp\htdocs` on your system.  

2. **Open Terminal in the Directory**  
   - Open a terminal or command prompt in the `htdocs` folder.  

3. **Clone the Repository**  
   - Run the following command:  
     ```bash
     git clone https://github.com/mamoonbgc036/EventMg.git
     ```  

4. **Create a Database**  
   - Open **phpMyAdmin**.  
   - Create a new database with a name of your choice.
5. **Put db Credentials**  
   - Open .env file at root of the project directory  
   - Put your db credentials there.  

6. **Import the Database**  
   - Navigate to `C:\xampp\htdocs\EventMg`.  
   - Locate and import the `db.sql` file into the newly created database via **phpMyAdmin**.  

7. **Run the Application**  
   - Open a browser and go to:  
     ```
     http://localhost/EventMg
     ```  

8. **Setup Complete** 🎉  

### Admin Credentials  
   - **Email:** `admin@gmail.com`  
   - **Password:** `admin123`  

## Contributing  
Feel free to fork this repository and submit pull requests for improvements.  

## License  
This project is licensed under the MIT License.  
