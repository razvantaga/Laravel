<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';
    protected $fillable = ['image', 'name', 'email', 'phone', 'technology', 'profession', 'salary'];
    protected $primaryKey = 'id';
}
