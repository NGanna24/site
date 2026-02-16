<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MigbanDownload extends Model
{
    protected $fillable = [
        'ip_address',
        'user_agent',
        'device_type',
        'platform',
        'browser',
        'referer'
    ];

    protected $table = 'migban_downloads';
}