#!/bin/bash

# Start Laravel's built-in server
php artisan serve &

# Start BrowserSync
browser-sync start --proxy "http://127.0.0.1:8000/" --files "resources/**/*.php" "public/**/*.css" "public/**/*.js" "app/**/*.php" "routes/**/*.php" "config/**/*.php" "tests/**/*.php" &

npm run dev
