### Simple Contact Form with Vue and Laravel API

**Objective:** Create a basic contact form with frontend validation and backend processing.

### Application structure
The Laravel application code resides inside the `/api` directory. In the root there are files for the containerization and the readme file.

1. **Front-End (Vue.js):**
   - Basic laravel view inside `api\resources\views\contact\index.blade.php` loading vite configuration and setting the root element of the vue app.
   - Main single page vue application is `api\resources\js\App.vue` file, where the component, api calling and validation handling

2. **Back-End (Laravel):**
   - Main functionality is writting inside `api\app\Http\Controllers\ContactController.php` class.
   - There are other supporting classes such as repositories, requests for validation and services in the app as well.
   - Database table is created within the `migrations` directory.
   - An end to end test for couple of scenarios are inside `tests` directory.

3. **Dockerization:**
   - There are `docker-compose.yml` file for docker compose and all the docker files are inside `dockerfiles` directory.

### Running the application
1. Clone this [repository](https://github.com/janakad/conda-assignment).

2. Create `api/.env` file from `api/.env.example` file (The values are working for docker without any change).

3. Execute following commands in order.
   ```bash
   docker-compose up -d --build app
   docker-compose run --rm composer install
   docker-compose run --rm artisan migrate
   docker-compose run --rm npm run build #npm run dev for development
   ```
4. Access the application in http://localhost:80 and mailhog dashboard in http://localhost:8025

5. For running tests execute following command: 
```bash
docker-compose run --rm artisan test
```

6. There can be cases where application might not work because
* vendor or autoload missing, in that case run 
```bash
docker-compose run --rm composer install
```
* in case of directory issues run the following:
```bash
docker-compose run --rm artisan storage:link
```
   * for permission issues `sh` into the container and run: 
```bash
chmod -R 755 /var/www/storage
```
### Running the application in local environment(without docker)
1. Clone this [repository](https://github.com/janakad/conda-assignment).

2. Create `api/.env` file from `api/.env.example` file, then change the values in `.env` file relevant to database and mail server.

3. Execute following commands in order:
```bash
composer install
php artisan key:generate
php artisan migrate
npm run dev
php artisan serve
```

4. Access the application in http://localhost:8000

5. For tests, run following command:
```bash
php artisan test
```

### Improvements and optimizations
If there are more time I would optimize and improve following things:
1. Unit tests - an addition to end to end test I would write more unit tests for main classes by mocking database and mailhog to ensure the functionality of the individual classes and methods.
