<?php 

return [
    'default' => 'mysql',
    'connections' => 
    [
        'mysql' => 
        [
            'driver'    =>      ENV('DB_CONNECTION'),
            'host'      =>      ENV('DB_HOST'),
            'port'      =>      ENV('DB_PORT'),
            'database'  =>      ENV('DB_DATABASE'),
            'username'  =>      ENV('DB_USERNAME'),
            'password'  =>      ENV('DB_PASSWORD')
        ]
    ]
];