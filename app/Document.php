<?php namespace Doc;

use Illuminate\Database\Eloquent\Model;

class Document extends Model {

	protected $table = 'documents';

  protected $fillable = ['name', 'doc_source'];

//  public function categories(){
//    return $this->belongsToMany('Doc\Category', 'doc_cats_linker', 'doc_id', 'cat_id');
//  }
////
//  public function vars(){
//    return $this->belongsToMany('Doc\DocVar', 'doc_vars_linker', 'doc_id', 'var_id');
//  }
//
//  public function user()
//  {
//    return $this->hasManyThrough('Doc\User', 'Doc\Category', 'id', 'id');
//  }

  public function categories()
  {
    return $this->belongsToMany('Doc\Category');
  }

  public function vars()
  {
    return $this->hasMany('Doc\Variable');
  }

  public function roles()
  {
    return $this->belongsToMany('Doc\Role');
  }

}
