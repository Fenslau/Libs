<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function author() {
        return $this->belongsTo(User::class, 'login', 'from_user');
    }
    public function adresat() {
        return $this->belongsTo(User::class, 'login', 'to_user');
    }
}
