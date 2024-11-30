<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable = ['image', 'name', 'id_category', 'technology', 'description', 'price'];
    protected $primaryKey = 'id';

    public function category() { 
        return $this->belongsTo(Category::class, 'id_category', 'category_id');
    }
}
