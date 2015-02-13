<?php namespace Doc;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

	protected $fillable = ['name'];

//  public function user()
//  {
//    return $this->hasMany('Doc\User');
//  }

  public function user()
  {
    return $this->belongsTo('Doc\User');
  }
//
  public function categories()
  {
    return $this->belongsToMany('Doc\Category');
  }

  public function documents()
  {
    return $this->belongsToMany('Doc\Document');
  }

}

