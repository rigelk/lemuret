<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class settings extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'settings';

    /**
     * The attributes that protected against exterior modification.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function set($key,$value)
    {
	$this->where('id', 1)
	    ->update([$key => $value]);
    }

    public function get($key)
    {
	//$this->where('id', 1)->get('');
    }
}
