<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class User_info extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_info';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['info_lieu', 'info_gps', 'info_poste', 'info_promo', 'info_promo_type'];

}
