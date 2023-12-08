#run: "source alias.sh" to load aliases so they are used in the current shell session

alias art="php artisan"
alias migrate="php artisan migrate"
alias migrate:refresh="php artisan migrate:refresh"
alias migrate:reset="php artisan migrate:reset"
alias migrate:rollback="php artisan migrate:rollback"
alias migrate:status="php artisan migrate:status"
alias tinker="php artisan tinker"
alias serve="php artisan serve"

echo "alias.sh loaded"
