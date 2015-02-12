<?php namespace Doc;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

  protected $table = 'doc_cats';

	protected $fillable = ['name'];

  public function doc()
  {
    return $this->belongsToMany('Doc', 'doc_cats_linker');
  }
}
