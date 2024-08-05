# Embedded Forms

## Getting Started

### Install Libraries

```
composer.phar install
```

### Setting One Blink Keys

You will need to add two environment variables

```
export ONEBLINK_ACCESS_KEY=<Add your developer access key here>
export ONEBLINK_SECRET_KEY=<Add your developer secret key here>
```

### Running locally

1. In `index.php` update the below variables

```
$USERNAME = 'username';
$FORM_ID = 1;
$FORMS_APP_ID = 1;
$expiresInSeconds = 300;
```

2. run the following command

```
php -S localhost:8000
```

3. Open your browser and navigate to [http://localhost:8000](http://localhost:8000)
