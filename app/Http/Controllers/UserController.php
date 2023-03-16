<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\Images\UsersImages;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection;

class UserController extends Controller
{

    function __construct()
{

$this->middleware('permission:user_list', ['only' => ['index']]);
$this->middleware('permission:user_create', ['only' => ['create','store']]);
$this->middleware('permission:user_edit', ['only' => ['edit','update']]);
$this->middleware('permission:user_delete', ['only' => ['destroy']]);

}

/**

* @return \Illuminate\Http\Response
*/
public function index(Request $request)
{
$data = User::orderBy('id','DESC')->paginate(10);

return view('users.show_users',compact('data'))
->with('i', ($request->input('page', 1) - 1) * 5);
}


/**

* @return \Illuminate\Http\Response
*/
public function create()
{
$roles = Role::pluck('name','name')->all();

return view('users.Add_user',compact('roles'));

}
/**

* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/


public function store(Request $request)
{
    // return $request;die;
$this->validate($request, [
'name' => 'required',
'email' => 'required|email|unique:users,email',
'phone' => 'required|max:11',
'password' => 'required|same:confirm-password',
'roles_name' => 'required'
]);
 
$file_extension = $request->image->getClientOriginalExtension();
        $file_name =time().'.'.$file_extension;
        $path = 'Images/users';
        $request->image->move($path , $file_name );


$user = User::create([
    'name' => $request->name,
    'email' => $request->email,
    'phone' => $request->phone,
    'roles_name'=>$request->roles_name,
    'password' => Hash::make($request->password) ,
    'image' => $file_name,
    'status'=>$request->status
]);
UsersImages::create([
    'name' => $request->image,
    'user_id'=>(Auth::user()->id)

]);

$user->assignRole($request->roles_name);

return redirect()->route('users.index')
->with('success','User Add Success');
}

/**
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/


public function show($id)
{

$user = User::find($id);
return view('users.show',compact('user'));
}


/**
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/


public function edit($id)
{
$user = User::find($id);
$roles = Role::pluck('name','name')->all();
$userRole = $user->roles->pluck('name','name')->all();
return view('users.edit',compact('user','roles','userRole'));
}


/**
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/


public function update(Request $request, $id)
{
$this->validate($request, [
'name' => 'required',
'email' => 'required|email|unique:users,email,'.$id,
'password' => 'same:confirm-password',
'roles_name' => 'required'
]);
$input = $request->all();
// return $input;die;

if(!empty($input['password'])){
$input['password'] = Hash::make($input['password']);
}else{
$input = Arr::except($input,array('password'));
}
$user = User::find($id);
$user->update($input);
DB::table('model_has_roles')->where('model_id',$id)->delete();
$user->assignRole($request->input('roles_name'));
return redirect()->route('users.index')
->with('success','Updated Success');
}



/**
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy(Request $request)
{
User::find($request->user_id)->delete();
return redirect()->route('users.index')->with('success','User Delete Success ');
}
}