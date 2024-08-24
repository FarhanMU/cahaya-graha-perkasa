<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class header extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function contents()
    {
        return $this->hasMany(header_content::class);
    }

}
