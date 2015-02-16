<?php namespace Doc\Http\Requests;

use Doc\Http\Requests\Request;

class CreateUserRequest extends Request {

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
			'username' => 'required|unique:users',
			'password' => 'required|min:6',
			'role_id' => 'required',
			'category_id' => 'required'
		];
	}

}
