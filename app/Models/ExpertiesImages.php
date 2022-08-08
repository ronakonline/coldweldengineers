<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpertiesImages extends Model
{
    use HasFactory;

    protected $table = 'experties_images';

    protected $fillable = [
        'experties_id', 'img'
    ];

    public function experties()
    {
        return $this->belongsTo(Experties::class);
    }
}
