<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'promos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['year', 'promo_image'];

}
