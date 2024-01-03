<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuCombo extends Model
{
    use HasFactory;
    protected $guarded =[];
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', "id");
    }

    public function combo()
    {
        return $this->belongsTo(Combo::class, "combo_id", "id");
    }
}
