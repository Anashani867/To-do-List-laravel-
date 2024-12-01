<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional, if the table name is different from pluralized model name)
    protected $table = 'tasks';

    // Define the attributes that are mass assignable
    protected $fillable = ['title', 'description', 'status'];

    // Define the attributes that should be hidden from arrays (for security reasons)
    protected $hidden = [];

    // Optionally, you can define relationships here if tasks are related to other models
    // Example: public function user() { return $this->belongsTo(User::class); }
}
