<?php namespace Doc\Http\Requests;

use Doc\Http\Requests\Request;

class CreateDocRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		/**
		 * TODO: check if the user has permission
		 */
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' => 'required|max:255',
			'doc_source' => 'required',
			'cat' => 'required|array',
			'input' => 'required|array'
		];
	}

}
