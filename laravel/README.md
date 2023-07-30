
## WHY LARAVEL?
<p>As a developer with experience working with PHP and MySQL, I choose Laravel as the framework for building the RESTful API for this assessment. 
Laravel has built-in features that ease the development of API in the backend, and it also follows the MVC pattern, making the code base for this project organized and modular.
For example, the logic of each endpoint that implements the CRUD system for this assessment is written in a controller file, while the logic that is used to handle the data passed from
the database is written in model files. Each table from the database is represented by a model in this code base and the models are in <i><b>app/Models</b></i> directory. In addition, the routing of the
API endpoints and the implementation of authentication system  is written in a separate file, <i><b>app/routes/api.php</b></i>. Overall, Laravel has the tools and features I need to complete the technical
requirements for this assessment.
</p>

## Instructions

<li>Before cloning this project to your local machine, make sure that <a href="https://www.php.net/">PHP</a> and <a href="https://getcomposer.org/">Composer</a> is installed in your machine.</li>
<li>After you have installed PHP and Composer, clone this project to your local machine and navigate to "laravel" directory</li>
<li>Within the project directory, replace the <i>.env.example</i> file with <i>.env file</i>.</li>
<li>In the .env file, replace the database environment with your own.
```bash
DB_CONNECTION=mysql
DB_HOST={your_host}
DB_PORT={your_port}
DB_DATABASE={your_db}
DB_USERNAME={your_username}
DB_PASSWORD={your_password}
```
</li>


## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
