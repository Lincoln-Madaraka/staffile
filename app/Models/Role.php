<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public const ADMIN = 'admin';
    public const DOCTOR = 'doctor';
    public const PATIENT = 'patient';

    protected $fillable = ['name'];

    /**
     * A role has many users.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
