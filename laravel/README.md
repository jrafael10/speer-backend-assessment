
## WHY LARAVEL?
<p>As a developer with experience working with PHP and MySQL, I choose Laravel as the framework for building the RESTful API for this assessment. 
Laravel has built-in features that ease the development of API in the backend, and it also follows the MVC pattern, making the code base for this project organized and modular.
For example, the logic of each endpoint that implements the CRUD system for this assessment is written in a controller file, while the logic that is used to handle the data passed from
the database is written in model files. Each table from the database is represented by a model in this code base and the models are in <i><b>app/Models</b></i> directory. In addition, the routing of the
API endpoints and the implementation of authentication system  is written in a separate file, <i><b>app/routes/api.php</b></i>. This project uses MySQL as its database because it comes by default with Laravel, but you can also use the database of your choice.</p>

## Instructions

- Before cloning this project to your local machine, make sure that <a href="https://www.php.net/">PHP</a> and <a href="https://getcomposer.org/">Composer</a>  is installed in your machine.
- After you have installed PHP and Composer, clone this project to your local machine and navigate to "laravel" directory.
- Within the project directory, replace the <i>.env.example</i> file with <i>.env file</i>.
- In the .env file, replace the database environment with your own.

```
DB_CONNECTION=mysql or 
DB_HOST={your_host}
DB_PORT={your_port}
DB_DATABASE={your_db}
DB_USERNAME={your_username}
DB_PASSWORD={your_password}
```
- Run ```php artisan migrate``` within the project directory to run the migrations from <i><b>app/database/migrations</b></i> and populate the database.
- Run ```php artisan serve``` to run the project and you can now start testing the API using Postman or any API testing tool of your choice.
- Run ```php artisan test``` to run the unit tests.

##

