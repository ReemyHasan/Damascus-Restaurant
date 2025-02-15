# Laravel Project

## Installation Guide

Follow these steps to set up and run the project on your local machine.

### Prerequisites
Ensure you have the following installed on your system:
- PHP (compatible version with Laravel)
- Composer
- MySQL or any other supported database
- Laravel CLI

### Setup Instructions

1. **Clone the Repository**
   ```sh
   git clone https://github.com/your-repo/your-project.git
   cd your-project
   ```

2. **Create the `.env` File**
   Copy the example environment file and update the necessary configurations:
   ```sh
   cp .env.example .env
   ```
   Update your `.env` file with database credentials and other necessary settings.

3. **Install Dependencies**
   ```sh
   composer install
   ```

4. **Generate Application Key**
   ```sh
   php artisan key:generate
   ```

5. **Run Migrations and Seed Database**
   ```sh
   php artisan migrate --seed
   ```

6. **Serve the Application**
   ```sh
   php artisan serve
   ```
   Your application should now be running at `http://127.0.0.1:8000/`.

### Additional Commands
- **Clear Cache**: `php artisan cache:clear`
- **Storage Link**: `php artisan storage:link`
