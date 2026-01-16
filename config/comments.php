<?php

use App\Models\Comment;
use App\Models\User;

return [
    // The model which creates the comments aka the User model
    'models' => [
        'commenter' => User::class,
        'comment' => Comment::class,
    ],
    'ui' => 'bootstrap4',
    'purifier' => [
        'HTML_Allowed' => 'p',
    ],
    'route' => [
        'root' => null,
        'group' => 'comments'
    ],
    'policy_prefix' => 'comments',
    'testing' => [
        'seeding' => [
            'commentable' => '\App\Models\Post',
            'commenter' => '\App\Models\User'
        ]
    ],
    /**
     * Only for API
     *
     * @example ['get']['preprocessor']['user'] => App\UseCases\CommentPreprocessor\User::class
     */
    'api' => [
        'get' => [
            'preprocessor' => [
                'user' => null,
                'comment' => null
            ]
        ]
    ]
];
