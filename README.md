### SETUP GUIDE

## STEP 1: Cloning the Repository
- Choose a folder to clone the repository
- Open a terminal to that directory
- Run `git clone https://github.com/enfaith1/Animal-Bite-Immunization-Scheduler.git`
- Move into the project directory `cd Animal-Bite-Immunization-Scheduler`

## STEP 2: Install Dependencies
- Ensure you have PHP 8.4.0+ and Composer 2.9.5+
- If not, use the commands found on [Laravel's Official Website](https://laravel.com/docs/12.x/installation#creating-a-laravel-project)
- Run `composer install` and `npm install` on your terminal
- Also run `npm run dev` and `npm run build`

## STEP 3: Create the Database
- Open a Local Server Environment like XAMPP or Laragon
- Enable a MySQL database server
- Create a new EMPTY database named `animal_bite_center_db`
- Keep MySQL open as you run the project

## STEP 4: Configure Environment
- Copy the .env file using `copy .env.example .env` on the terminal in Windows
- Or simply copy and paste the ".env.example" file and remove the ".example" extension
- Open the .env file in your chosen IDE
- Edit the following sections with these credentials:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=animal_bite_center_db
DB_USERNAME=root
DB_PASSWORD=
```
- For the emailing section (this will be removed by April 30, 2026):
```
MAIL_MAILER=smtp
MAIL_SCHEME=null
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=crivera_240000001717@uic.edu.ph
MAIL_PASSWORD=sywqdmjigsmgfoui
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```
- Set the APP_KEY using `php artisan key:generate`

## STEP 5: Migrations and Dummy Data
- In the terminal, use `php artisan migrate:fresh --seed` to migrate tables and create dummy data using the seeders.

## STEP 6: Start the Deployment Server
- Run in terminal `php artisan serve`
- Access the app at http://127.0.0.1:8000
