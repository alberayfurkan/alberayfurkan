<?php
/**
 * Handle form submission via AJAX.
 *
 * This script handles form validation and submission for different languages.
 *
 */

include '../../ajax.php';

// Initialize system and model instances
$system = System::getInstance();
$model  = Model::getInstance('Model');

// Define messages for different languages
$messages = [
    'en' => [
        'invalid_email' => 'Please enter a valid email address.',
        'missing_fields' => 'Please fill in all fields!',
        'csrf_error' => 'An error occurred while processing your information!',
        'submission_success' => 'Your information has been received.',
        'submission_error' => 'An error occurred while processing your information.',
        'email_exists' => 'This email address is already registered.'
    ],
    'tr' => [
        'invalid_email' => 'Lütfen geçerli bir e-posta adresi giriniz.',
        'missing_fields' => 'Tüm alanları doldurun!',
        'csrf_error' => 'Bilgileriniz alınırken sorun oluştu!',
        'submission_success' => 'Bilgileriniz alınmıştır.',
        'submission_error' => 'Bilgileriniz alınırken sorun oluştu.',
        'email_exists' => 'Bu e-posta adresi zaten kayıtlı.'
    ],
    'de' => [
        'invalid_email' => 'Bitte geben Sie eine gültige E-Mail-Adresse ein.',
        'missing_fields' => 'Bitte füllen Sie alle Felder aus!',
        'csrf_error' => 'Beim Verarbeiten Ihrer Informationen ist ein Fehler aufgetreten!',
        'submission_success' => 'Ihre Informationen wurden erhalten.',
        'submission_error' => 'Beim Verarbeiten Ihrer Informationen ist ein Fehler aufgetreten.',
        'email_exists' => 'Diese E-Mail-Adresse ist bereits registriert.'
    ]
];

// Check if the request is an AJAX request
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    extract($_POST);

    // Default language if not specified
    if (!array_key_exists($site_lang, $messages)) {
        $site_lang = 'tr'; // Turkish as default language
    }

    $response = ['success' => false, 'message' => ''];

    // Validate email address
    if (!$system->validete_email($cf_email)) {
        $response['message'] = $messages[$site_lang]['invalid_email'];
        echo json_encode($response);
        exit;
    }

    // Sanitize input data
    $csrf_token = $system->sanitize($csrf_token);
    $cf_name    = $system->sanitize($cf_name);
    $cf_message = $system->sanitize($cf_message);

    // CSRF token validation
    if (!$csrf_token || $csrf_token !== $_SESSION['csrf_token']) {
        $response['message'] = $messages[$site_lang]['csrf_error'];
    } else {
        // Check for missing fields
        if (empty($cf_name) || empty($cf_email) || empty($cf_message)) {
            $response['message'] = $messages[$site_lang]['missing_fields'];
        } else {
            // Save form data
            $saveMessage = $model->saveApp($_POST);
            // Handle save response
            if ($saveMessage === 'submission_success') {
                $response['success'] = true;
                $response['message'] = $messages[$site_lang]['submission_success'];
            } elseif ($saveMessage === 'email_exists') {
                $response['message'] = $messages[$site_lang]['email_exists'];
            } else {
                $response['message'] = $messages[$site_lang]['submission_error'];
                unset($_SESSION['csrf_token']);
            }
        }
    }

    // Send JSON response
    echo json_encode($response);
    exit;
} else {
    // Handle non-AJAX requests
    header("HTTP/1.0 404 Not Found");
    exit();
}
