<?php namespace Doc;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

	protected $fillable = ['name'];

//  public function user()
//  {
//    return $this->hasMany('Doc\User');
//  }

  public function users()
  {
    return $this->hasMany('Doc\User');
  }

}

