<?php namespace Doc;

use Illuminate\Database\Eloquent\Model;

class Variable extends Model {

	protected $table = 'vars';

	protected $fillable = ['name', 'var'];

//	public function doc()
//	{
//		return $this->belongsToMany('Doc\Doc', 'doc_vars_linker', 'var_id', 'doc_id');
//	}
	public function document()
	{
		return $this->belongsTo('Doc\Document');
	}
}
