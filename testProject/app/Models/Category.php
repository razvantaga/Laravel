<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = ['category_logo', 'category_name', 'category_technology', 'category_description'];
    protected $primaryKey = 'category_id';

    public function services() { 
        return $this->hasMany(Service::class, 'id_category', 'category_id');
    }
    
}
