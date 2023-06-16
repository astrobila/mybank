<?php

$fields = [
    'username' => 'string | required | alphanumeric | between: 3, 25 | unique: users, username',
    'email' => 'email | required | email | unique: users, email',
    'password' => 'string | required | secure',
    'password2' => 'string | required | same: password'
];

// custom messages
$messages = [
    'username' => [
        'required' => 'username should not be empty.',
        'between' => 'username should have the length of 3 - 25'
    ],
    'password2' => [
        'required' => 'Please enter the password again',
        'same' => 'The password does not match'
    ],
]

?>