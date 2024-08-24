<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact_us extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function contents()
    {
        return $this->hasMany(contact_us_content::class);
    }

}
