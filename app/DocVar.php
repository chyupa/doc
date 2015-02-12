<?php namespace Doc;

use Illuminate\Database\Eloquent\Model;

class DocVar extends Model {

	protected $table = 'doc_vars';

	protected $fillable = ['name', 'var'];

	public function doc()
	{
		return $this->belongsToMany('Doc', 'doc_vars_linker');
	}
}
