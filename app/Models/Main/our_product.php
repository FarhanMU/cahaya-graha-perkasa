<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class our_product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function contents()
    {
        return $this->hasMany(our_product_content::class);
    }

}
