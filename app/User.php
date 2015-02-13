<?php namespace Doc;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Auth;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'role_id', 'password', 'username'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = bcrypt($password);
	}

	public function isAdmin()
	{
		$role = Auth::user()->role_id;
		if( $role == 1 )
			return true;
		else
			return false;
	}

//	public function role()
//	{
//		return $this->belongsTo('Doc\UserRoles');
//	}
//
//	public function categories()
//	{
////		return $this->belongsToMany('Doc\Category', 'user_doc_cat_linker', 'user_id', 'cat_id');
//		return $this->hasMany('Doc\Category');
//	}
//
//	public function docs()
//	{
////		return $this->hasManyThrough('Doc\Doc', 'Doc\Category', 'id', 'id');
//	}

	public function role()
	{
		return $this->belongsTo('Doc\Role');
	}

	public function documents()
	{
		return $this->role->belongsToMany('Doc\Document');
	}


}
