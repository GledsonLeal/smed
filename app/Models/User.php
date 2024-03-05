<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\RedefinirSenhaNotification;
use App\Notifications\VerificarEmailNotification;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    //FUNÇÃO CRIADA
    //CLASSES DE NOTIFICAÇÃO
    //São classes que são sobrescritas, interrompendo o fluxo normal do laravel
    public function sendPasswordResetNotification($token){
        //dd('chegamos aqui');
        //método da use Illuminate\Notifications\Notifiable;
        $this->notify(new RedefinirSenhaNotification($token, $this->email, $this->name));// instância da classe que está em app/Notifications
    }
    public function sendEmailVerificationNotification(){
        $this->notify(new VerificarEmailNotification($this->name));
    }
}
