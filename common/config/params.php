<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'user.passwordResetTokenExpire' => 3600,
    'user.passwordMinLength' => 8,
    
    
    'frontend_url' => env('FRONTEND_URL'),
    'backend_url' => env('BACKEND_URL'),
    
    'storage_path' => env('STORAGE_PATH'),
    'storages' => json_decode(env('STORAGES'), true),
    
    
];
