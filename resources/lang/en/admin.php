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

    'state' => [
        'title' => 'States',

        'actions' => [
            'index' => 'States',
            'create' => 'New State',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            
        ],
    ],

    'task' => [
        'title' => 'Tasks',

        'actions' => [
            'index' => 'Tasks',
            'create' => 'New Task',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'date_begin' => 'Date begin',
            'date_end' => 'Date end',
            'obs' => 'Obs',
            'state_id' => 'State',
            'advance' => 'Advance',
            
        ],
    ],

    'detail-task' => [
        'title' => 'Detail Tasks',

        'actions' => [
            'index' => 'Detail Tasks',
            'create' => 'New Detail Task',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'task_id' => 'Task',
            'state_id' => 'State',
            'date_begin' => 'Date begin',
            'date_end' => 'Date end',
            'obs' => 'Obs',
            'user_id' => 'User',
            'advance' => 'Advance',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];