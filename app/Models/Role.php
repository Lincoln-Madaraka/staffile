<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Stored values in DB (must match exactly)
    public const ADMIN = 'admin';
    public const DOCTOR = 'doctor';
    public const PATIENT = 'patient';

    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
