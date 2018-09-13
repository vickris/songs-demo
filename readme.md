## Installation instructions
1. Clone the repo via this url `git@github.com:vickris/songs-demo.git`
2. Get inside the project folder `cd songs-demo`
3. Create a `.env` file by running the following command `cp .env.example .env`. Update your database credentials inside this `.env` file.
4. Install various packages and dependencies: `composer install`. **Note:** you have to be inside your Laravel development environment for this to work. For those using vagrant, make sure you `ssh` into Vagrant before running `composer install`
5. Generate an encryption key for the app: `php artisan key:generate`.
6. Run migrations and seed database with some sample data: `php artisan migrate:refresh --seed`.
6. You are now good to go.
