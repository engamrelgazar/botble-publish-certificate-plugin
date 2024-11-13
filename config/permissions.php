<?php

return [
    [
        'name' => 'Certificates',
        'flag' => 'certificate.index',
    ],
    [
        'name' => 'Create',
        'flag' => 'certificate.create',
        'parent_flag' => 'certificate.index',
    ],
    [
        'name' => 'Edit',
        'flag' => 'certificate.edit',
        'parent_flag' => 'certificate.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'certificate.destroy',
        'parent_flag' => 'certificate.index',
    ],
];
