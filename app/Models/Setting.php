<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = "settings";

    protected $fillable =[
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'youtube',
        'title',
        'description',
        'key_words',
        'phone',
        'fax',
        'email',
        'address',
        'logo',
        'contact_email',
        'carrers_email',
        'url',
        'pobox',
        'post_code',
        'working_time',
        'working_days',
    ];
}
