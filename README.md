## Installation
Clone the repository and install the dependency

```bash
- cd vehicle-management
- git init
- git clone https://github.com/albertineMap/vehicle-management.git
- cp .env.example .env
- composer install
- php artisan key:generate
- npm install
```

Then create the necessary database.

**Database** 

   - Create new database vehicles in phpmyAdmin
   - Set database information .env file
        - DB_CONNECTION=mysql
        - DB_HOST=127.0.0.1
        - DB_PORT=3306
        - DB_DATABASE=vehicles
        - DB_USERNAME=root
        - DB_PASSWORD=

And run the initial migration

```bash
php artisan migrate 
```
 
**Run application**

 To run the application
 
 ```bash
 composer install
 php artisan serve 
 npm run watch
 ```
 
**To run test**

## Tests
#### if you are not connected you are redirect to login page
-   you can try this route to test 
-   http://localhost:8000/create or http://localhost:8000/user/list
### Tests for wrong data are not functional
    -Validation works
    -Error redirection too
    -But error display does not work
    -So nothing happens when you put bad data   
