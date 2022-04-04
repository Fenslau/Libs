<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Support\Facades\App;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function create($password) {
        $login = User::latest()->first();
        if ($login) $this->login = $login->id+1; else $this->login = 1;
        $this->name = config('languages')[App::currentLocale()]['name'];
        $this->email = 'testUser'.$this->login.'@test.com';
        $this->user_lang = App::currentLocale();
        $this->password = bcrypt($password);
        $this->save();
    }

    public function messagesFrom() {
        return $this->hasMany(Messages::class, 'from_user', 'login');
    }

    public function messagesTo() {
        return $this->hasMany(Messages::class, 'to_user', 'login');
    }
}
