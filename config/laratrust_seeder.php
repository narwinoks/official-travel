<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => true,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'pegawai' => [
            'pengajuan' => 'c,r',
        ],
        'sdm'=>[
            'city' =>'c,r,u,d',
            'pengajuaan' => 'c,r,u',
        ],
        'admin'=>[
            'user' =>'c,r,u,d',
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
