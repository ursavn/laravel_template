# Run with Docker

1. Create .env config

   ```bash
   cp .env.dev .env
   ```

2. Install package

   ```bash
   # Window
   docker run --rm -v %cd%:/app composer install
   # Linux
   docker run --rm -v $(pwd):/app composer install
   ```

3. Run docker compose

   ```bash
   docker-compose up -d
   ```

4. Generate key and refresh cache

   ```bash
   docker-compose exec app bash
   php artisan config:clear
   php artisan key:generate
   php artisan config:cache
   ```

5. Run migrate & seed database

   ```base
   php artisan migrate
   php artisan db:seed
   ```

6. Go to http://localhost:8080
