<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactAs extends Model
{
    use HasFactory;
    protected $table = 'contact_as';
    protected $fillable = ['first_name', 'last_name', 'email', 'description'];
}
