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

### Setting form properties

1. In `index.php` update the below variables

```
$USERNAME = 'username';
$FORM_ID = 1;
$FORMS_APP_ID = 1;
$expiresInSeconds = 300;
```

### Setting Redirect Urls

The example template is configured to redirect to https://google.com after submitting or canceling the form.
You can change this behaviour by updating the `submissionRedirectUrl` and `cancelRedirectUrl` properties in `OneBlinkForms.render`

### Running locally

1. run the following command

```
php -S localhost:8000
```

2. Open your browser and navigate to [http://localhost:8000](http://localhost:8000)
