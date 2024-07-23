# 30 days to learn Laravel

## Run with Herd
http://laravel-course.test

## Usefull commands used in the course

Sandbox for Eloquent instructions or whatever you want
```sh
php artisan tinker
```

Handle migrations
```sh
php artisan make:migration # generate a new migration
php artisan migrate # execut migration
php artisan migrate:fresh # execute fresh new migration
php artisan migrate:refresh # execute only changes
```

Handle seeds
```sh
php artisan migrate:fresh --seed # execute fresh new migration injecting seeds
```

Generate new things
```sh
php artisan make:policy
php artisan make:factory
php artisan make:mail
php artisan make:job
```

Update vendor library (in this repo for the pagination component)
```sh
php artisan vendor:publish
```

List all routes in the app except default ones
```sh
php artisan route:list --except-vendor
```

Queues, jobs, workers
```sh
php artisan queue:work # Call a worker to execute jobs (here the mail)
```

Install Tailwind to avoid using there CDN
```sh
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init -p # generate config files
```

Vite
```sh
npm run dev # for hot reload
vite build # built for prod environment
```
