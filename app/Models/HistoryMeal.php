<?php

namespace App\Models;

use App\Models\Menu;
use App\Models\Allergen;
use App\Models\AllergenMeal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HistoryMeal extends Model
{
    use HasFactory;

    public function menu() {
        return $this->belongsTo(Menu::class);
    }

    public function allergens() {
        return $this->belongsToMany(Allergen::class);
    }
}
