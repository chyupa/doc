<?php namespace Doc;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

  protected $table = 'categories';

	protected $fillable = ['name'];

//  public function doc()
//  {
//    return $this->belongsToMany('Doc\Doc', 'doc_cats_linker', 'cat_id', 'doc_id');
//  }
//
//  public function users()
//  {
//    return $this->belongsToMany('Doc\User', 'user_doc_cat_linker', 'cat_id', 'user_id');
//  }

  public function roles()
  {
    return $this->belongsToMany('Doc\Role');
  }

  public function document()
  {
    return $this->belongsToMany('Doc\Document');
  }

}
