<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact_us_content extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function contact_us()
    {
        return $this->belongsTo(contact_us::class);
    }

}
