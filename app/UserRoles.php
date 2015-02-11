<?php namespace Doc;

use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model {

	protected $fillable = ['name'];

  public function user()
  {
    return $this->hasMany('Doc\User');
  }

}
