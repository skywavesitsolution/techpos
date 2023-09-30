<?php

namespace App\Models\product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class brand extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'metadata',
    ];
}
