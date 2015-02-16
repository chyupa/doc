<?php namespace Doc;

use Illuminate\Database\Eloquent\Model;

class Variable extends Model {

	protected $table = 'variables';

	protected $fillable = ['name', 'var', 'document_id'];

	public function document()
	{
		return $this->belongsTo('Doc\Document');
	}
}
