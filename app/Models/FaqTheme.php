<?php

namespace App\Models;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FaqTheme extends Model
{
    use HasFactory;

    public function faq(){
        return $this->hasMany(Faq::class);
    }
}
