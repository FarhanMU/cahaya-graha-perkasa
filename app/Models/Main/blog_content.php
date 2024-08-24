<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog_content extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function blog()
    {
        return $this->belongsTo(blog::class);
    }

}
