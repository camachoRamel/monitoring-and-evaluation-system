<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'users';
    protected $guarded = [];
    protected $casts = [
        'password' => 'hashed'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function internHandler() : HasMany
    {
        return $this->hasMany(InternHandler::class);
    }

    public function weeklyEvaluation() : HasMany
    {
        return $this->hasMany(WeeklyEvaluation::class);
    }

    public function weekyReport() : HasOne
    {
        return $this->hasOne(WeeklyReport::class);
    }

    public function requirement() : Hasone
    {
        return $this->hasOne(Requirements::class);
    }

}
