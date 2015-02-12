<?php namespace Doc;

use Illuminate\Database\Eloquent\Model;

class Doc extends Model {

	protected $table = 'default_docs';

  protected $fillable = ['name', 'doc_source'];

  public function categories(){
    return $this->belongsToMany('Doc\Category', 'doc_cats_linker', 'doc_id', 'cat_id');
  }
//
  public function vars(){
    return $this->belongsToMany('Doc\DocVar', 'doc_vars_linker', 'doc_id', 'var_id');
  }

}
