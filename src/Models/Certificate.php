<?php

namespace elgazar\Certificate\Models;

use Botble\Base\Casts\SafeContent;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;

class Certificate extends BaseModel
{
    protected $table = 'certificates';

    protected $fillable = [
        'title',
        'status',
        'image_url',
    ];

    protected $casts = [
        'status' => BaseStatusEnum::class,
        'title' => SafeContent::class, 
    ];
}