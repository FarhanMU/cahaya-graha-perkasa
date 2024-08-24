<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class why_us_content extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function why_us()
    {
        return $this->belongsTo(why_us::class);
    }

}
