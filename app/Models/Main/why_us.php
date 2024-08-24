<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class why_us extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function contents()
    {
        return $this->hasMany(why_us_content::class);
    }

}
