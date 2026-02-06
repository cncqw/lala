# Lalaland 

## Introduction
This is a full-stack web application consisting of a Laravel backend and a Vue 3 frontend.

## Directory Structure
- `backend/`: Laravel backend application
- `frontend/web/`: Vue 3 frontend application

## Requirements
- PHP 8.2+
- Composer
- Node.js 18+
- NPM / PNPM

## Installation & Setup

### Backend
1. Navigate to the backend directory:
   ```bash
   cd backend
   ```
2. Install PHP dependencies:
   ```bash
   composer install
   ```
3. Copy the environment file:
   ```bash
   cp .env.example .env
   ```
4. Generate application key:
   ```bash
   php artisan key:generate
   ```
5. Set up the database (SQLite is configured by default):
   ```bash
   touch database/database.sqlite
   php artisan migrate
   ```
6. Start the development server:
   ```bash
   php artisan serve
   ```

### Frontend
1. Navigate to the frontend directory:
   ```bash
   cd frontend/web
   ```
2. Install Node dependencies:
   ```bash
   pnpm install
   # or
   npm install
   ```
3. Start the development server:
   ```bash
   pnpm dev
   # or
   npm run dev
   ```

## Development Script
A `start-dev.sh` script is provided in the root directory. Note that you might need to adjust the paths in the script if they do not match the current directory structure.

## License
MIT
