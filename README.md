## CRM

CRM system for manage clients for client loans

## Instalation steps
1. git clone git@github.com:programermaster/crm.git .
2. composer install
3. create database "crm"
4. edit .env file and change connection params for connecting to db
5. php artisan migrate:fresh --seed
6. php artisan storage:link
7. php artisan serve
8. open in browser tab http://127.0.0.1:8000
9. click on login http://127.0.0.1:8000/login
10. username : adviser1@gmail.com    pass: adviser1  for access adviser1
11. username : adviser2@gmail.com    pass: adviser1   for access adviser2
