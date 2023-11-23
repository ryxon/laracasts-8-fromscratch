#!/bin/bash

alias art="php artisan"
alias migrate="php artisan migrate"
alias migrate:refresh="php artisan migrate:refresh"
alias migrate:reset="php artisan migrate:reset"
alias migrate:rollback="php artisan migrate:rollback"
alias migrate:status="php artisan migrate:status"
alias tinker="php artisan tinker"
alias serve="php artisan serve"

# Start Laravel's built-in server
php artisan serve &

# Start BrowserSync
browser-sync start --proxy "http://127.0.0.1:8000/" --files "resources/**/*.php" "public/**/*.css" "public/**/*.js" "app/**/*.php" "routes/**/*.php" "config/**/*.php" "tests/**/*.php" &

npm run dev
