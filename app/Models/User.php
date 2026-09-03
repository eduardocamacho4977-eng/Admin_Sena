<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const ROLE_APPRENTICE = 'aprendiz';
    public const ROLE_INSTRUCTOR = 'instructor';
    public const ROLE_APPLICANT = 'aspirante';
    public const ROLE_ADMINISTRATOR = 'administrador';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getEffectiveRole(): string
    {
        return session('selected_role', $this->role ?? self::ROLE_APPRENTICE);
    }

    public function isAdmin(): bool
    {
        return $this->getEffectiveRole() === self::ROLE_ADMINISTRATOR;
    }

    public function isInstructor(): bool
    {
        return $this->getEffectiveRole() === self::ROLE_INSTRUCTOR;
    }

    public function isApplicant(): bool
    {
        return $this->getEffectiveRole() === self::ROLE_APPLICANT;
    }

    public function isApprentice(): bool
    {
        return $this->getEffectiveRole() === self::ROLE_APPRENTICE;
    }

    public function hasRole(array $roles): bool
    {
        return in_array($this->getEffectiveRole(), $roles, true);
    }
}