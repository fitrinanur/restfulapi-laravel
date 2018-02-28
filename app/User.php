<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    const VERIFIED_USER     ='1';
    const UNVERIFIED_USER   ='0';

    const ADMIN_USER = true;
    const GENERAL_USER = false;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'verified', 'verification_token', 'admin'
    ];

    protected $dates = [ 'deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'verification_token'
    ];

    /**
     * @return bool
     */
    public function isVerified()
    {
        return $this->verified == User::VERIFIED_USER;
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return $this->admin == User::ADMIN_USER;
    }

    /**
     * @return string
     */
    public static function generateVerificationCode()
    {
        return str_random(40);
    }

    /**
     * @param $name
     * Accessor
     */
    public function setNameAttribute($name)
    {
        $this->attributes['name'] =  strtolower($name);
    }

    /**
     * @param $name
     * @return string
     * Mutators
     */
    public function getNameAttribute($name)
    {
        return ucwords($name);
    }

    /**
     * @param $email
     * Accessor
     */
    public function setEmailAttribute($email)
    {
        $this->attributes['email'] = strtolower($email);
    }
}
