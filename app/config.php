<?php 
    Return [ 
        'database' => [ 
        'name' => 'cursophp', 
        'username' => 'userCurso', 
        'password' => 'php', 
        'connection' => 'mysql:host=localhost', 
        'options' => [ 
            PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8",      
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ,        
            PDO::ATTR_PERSISTENT => true                   
        ] 
    ] 
];