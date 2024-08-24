<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class card_content extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function card()
    {
        return $this->belongsTo(card::class);
    }

}
