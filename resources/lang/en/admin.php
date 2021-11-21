<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'subject' => [
        'title' => 'Subjects',

        'actions' => [
            'index' => 'Subjects',
            'create' => 'New Subject',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'status' => 'Status',
            
        ],
    ],

    'test' => [
        'title' => 'Tests',

        'actions' => [
            'index' => 'Tests',
            'create' => 'New Test',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'question' => 'Question',
            'answers' => 'Answers',
            'correct_answer_id' => 'Correct answer',
            'subject_id' => 'Subject',
            'status' => 'Status',
            
        ],
    ],

    'file' => [
        'title' => 'Files',

        'actions' => [
            'index' => 'Files',
            'create' => 'New File',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'url' => 'Url',
            'subject_id' => 'Subject',
            'imported' => 'Imported',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];