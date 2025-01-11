# Chatterbox

Chatterbox is a real-time chat application built with Laravel Blade and WebSockets. This project allows users to engage in live conversations with seamless updates, leveraging the power of Laravel's WebSockets for real-time communication.

## Features
- Real-time messaging using WebSockets
- User-friendly interface with Laravel Blade
- Easy setup and configuration

## Requirements
- PHP >= 8.0
- Composer
- Node.js >= 14.x
- MySQL or any supported database
- Laravel WebSockets package

## Installation

Follow the steps below to set up and run the Chatterbox project locally.

### 1. Clone the Repository
```bash
git clone https://github.com/amos-babu/chatterbox.git
cd chatterbox
```

### 2. Install Dependencies

#### Backend (Laravel):
Install PHP dependencies using Composer:
```bash
composer install
```

#### Frontend:
Install Node.js dependencies:
```bash
npm install
```

### 3. Set Up Environment Variables
Copy the `.env.example` file to `.env`:
```bash
cp .env.example .env
```
Update the `.env` file with your database credentials and WebSocket configuration. Example:
```env
APP_NAME=Chatterbox
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=chatterbox
DB_USERNAME=root
DB_PASSWORD=your_password

BROADCAST_DRIVER=pusher
PUSHER_APP_ID=your_app_id
PUSHER_APP_KEY=your_app_key
PUSHER_APP_SECRET=your_app_secret
PUSHER_APP_CLUSTER=your_cluster
```

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Run Database Migrations
```bash
php artisan migrate
```

### 6. Build Frontend Assets
Compile the frontend assets using Laravel Mix:
```bash
npm run dev
```
For production:
```bash
npm run build
```

### 7. Start the WebSocket Server
Ensure the Laravel WebSocket server is running:
```bash
php artisan websockets:serve
```

### 8. Start the Application
Run the Laravel development server:
```bash
php artisan serve
```

The application will be accessible at [http://localhost:8000](http://localhost:8000).

## Usage
1. Register a new user account or log in with existing credentials.
2. Navigate to the chat section and start messaging in real-time.

## Contributing
Feel free to fork the repository and submit pull requests. For major changes, please open an issue first to discuss what you would like to change.

## License
This project is licensed under the MIT License. See the `LICENSE` file for more details.

## Acknowledgments
- [Laravel WebSockets](https://beyondco.de/docs/laravel-websockets/getting-started)
- [Pusher](https://pusher.com)

---
For any inquiries or support, please contact [Amos Babu](https://github.com/amos-babu).

