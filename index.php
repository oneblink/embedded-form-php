<?php
require __DIR__ . '/vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

// Update these
$ONEBLINK_ACCESS_KEY = 'my-access-key'; //TODO
$ONEBLINK_SECRET_KEY = 'my-secret-key'; //TODO
$USERNAME = 'username'; //TODO
$FORM_ID = 1; //TODO
$FORMS_APP_ID = 1; //TODO
$SECONDS_FOR_USER_TO_SUBMIT_FORM = 300; //TODO
// The example template is configured to redirect to https://google.com after submitting or canceling the form.
// You can change this behaviour by updating the variables below
$SUBMISSION_REDIRECT_URL = 'https://google.com'; //TODO
$CANCEL_REDIRECT_URL = 'https://google.com'; //TODO


$dateTime = new DateTime();

$payload = [
  'iss' => $ONEBLINK_ACCESS_KEY,
  'iat' => $dateTime->getTimestamp(),
  'exp' => $dateTime->getTimestamp() + $SECONDS_FOR_USER_TO_SUBMIT_FORM,
  'sub' => $USERNAME,
  'oneblink:access' => [
    'submissions' => [
      'create' => [
        'formIds' => [$FORM_ID]
      ]
    ],
    'forms' => [
      'read' => [
        'ids' => [$FORM_ID]
      ]
    ]
  ]
];


$token = JWT::encode($payload, $ONEBLINK_SECRET_KEY, 'HS256');
?>
<html>
  <head>
    <!-- Icons required in Optimize Form. -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
</head>
  <body>
    <!-- Element to inject Optimize Form into -->
    <div id="optimize-form"></div>

    <!-- Script to load window.OneBlinkForms. -->
    <script src="https://civicplus-forms.cdn.transform.civicplus.com/1.x.x.js"></script>
    <!-- Script to inject an Optimize Form into HTML element above. -->
    <script>
      window.addEventListener('load', function () {
        // See https://github.com/oneblink/forms-cdn for documentation
        // on all of the options available when rendering an Optimize Form
        OneBlinkForms.render({
          selector: '#optimize-form',
          formId: <?= $FORM_ID ?>, // Form Id
          formsAppId: <?= $FORMS_APP_ID ?>, // Forms App Id
          // Change these to a URL you wish to send your users too
          submissionRedirectUrl: '<?= $SUBMISSION_REDIRECT_URL ?>',
          cancelRedirectUrl: '<?= $CANCEL_REDIRECT_URL ?>',
          // (Optional) An identifier to match the form submission with in your system.
          // externalId: '',
          // (Optional) The data to pre-fill the Optimize Form.
          // preFillData: {},
          // (Optional) A token that was signed by a developer key to allow submitting private forms
          token: '<?= $token ?>'
        })
      })
    </script>
  </body>
</html>