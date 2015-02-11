<?php namespace Doc\Http\Requests;

use Doc\Http\Requests\Request;

class EditUserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		/**
		 * TODO: check if user is admin
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
			'username' => 'required|max:255',
			'role_id' => 'required'
		];
	}

}
