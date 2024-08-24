<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class header_content extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function header()
    {
        return $this->belongsTo(header::class);
    }

}
