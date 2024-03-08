# Tradeshake Notes

Please note that as I don't have experience with Nuxt I wasn't able to incorporate it within the Laravel app.

## Installing

In both the Laravel and `client/` directory, node modules need to be installed.

```bash
npm ci
```

## Running

The Laravel app (http://localhost:8000) and Nuxt app (http://localhost:3000) need to be ran separately.

```bash
php artisan serve
```


```bash
npm run dev # in client/ directory
```

Also the auth'd username and password need to be changed (to whatever is seeded in the sqlite database) to get authenticated and fetch the data.
