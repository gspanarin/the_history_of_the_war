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
    'storages' => json_decode(env('STORAGES')),
    
    //версія Bootstrup для віджетів kartik 
    'bsVersion' => '4.x',
    
    
    
    // Налаштування окремих частин
    // BACKEND
    // Контролер ARTICLE
    'backend.article.pagination_pagesize' => env('BACKEND.ARTICLE.PAGINATION_PAGESIZE'),
    'backend.article.upload_file_extensions' => env('BACKEND.ARTICLE.UPLOAD_FILE_EXTENSIONS'),
    
    // FRONTEND
    // Контролер ARTICLE
    'frontend.article.pagination_pagesize' => env('FRONTEND.ARTICLE.PAGINATION_PAGESIZE'),
];
