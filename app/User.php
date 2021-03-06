<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['ip','firstname','lastname', 'email', 'password', 'address', 'zip', 'city','deleted_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['firstname','lastname','password', 'address', 'zip', 'city', 'remember_token','ip'];

    public function photos(){
        return $this->hasMany('App\Photo');
    }

    public function votes(){
        return $this->hasMany('App\Vote');
    }

    public function isAnAdmin()
    {
        $user = Auth::user();

        $userRole =  $this->join( 'role_user', 'role_user.user_id', '=', 'users.id' )->where( 'user_id', $user->id )->first();

        if ( ! is_null( $userRole ) ) {
            if($userRole->role_id == 1 )
            {
                return true;
            }
        }

        return false;
    }
}
