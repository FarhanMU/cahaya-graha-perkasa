<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class our_product_content extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function our_product()
    {
        return $this->belongsTo(our_product::class);
    }

}
