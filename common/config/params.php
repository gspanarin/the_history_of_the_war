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
    
    //версія Bootstrup для віджетів kartik 
    'bsVersion' => '4.x',
    
    
    
    // Налаштування окремих частин
    // BACKEND
    // Контролер ARTICLE
    'backend.article.pagination_pagesize' => env('BACKEND_ARTICLE_PAGINATION_PAGESIZE'),
    
    // FRONTEND
    // Контролер ARTICLE
    'frontend.article.pagination_pagesize' => env('FRONTEND_ARTICLE_PAGINATION_PAGESIZE'),
];
