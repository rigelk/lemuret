<?php namespace App;

use SleepingOwl\Models\SleepingOwlModel;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends SleepingOwlModel implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword, ShinobiTrait;

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
    protected $fillable = ['name', 'prenom', 'email', 'password'];

    /**
     * The attributes that protected against exterior modification.
     *
     * @var array
     */
    protected $guarded = ['id'];
    
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function tagArray()
    {
	return $this->hasMany('App\Tag', 'id', 'id')->select('info_tags')->distinct()->get()->toArray();
    }

}
