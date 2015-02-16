<?php namespace Doc;

use Illuminate\Database\Eloquent\Model;

class Document extends Model {

	protected $table = 'documents';

  protected $fillable = ['name', 'body'];

  public function categories()
  {
    return $this->belongsToMany('Doc\Category');
  }

  public function vars()
  {
    return $this->hasMany('Doc\Variable');
  }

}
