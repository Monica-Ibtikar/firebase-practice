<?php
return [
    'config' => [
        'projectId' => env('FIREBASE_PROJECT_ID'),
        'keyFile' => json_decode(file_get_contents(env('FIREBASE_CREDENTIALS')), true)
    ]
];