<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function __construct()
	{
    	$this->middleware(['role:admin']);
	}

    public function index()
    {
		$users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('admin.users.index')->with('message', 'User has been updated.');
    }

	public function delete(User $user)
    {
        return view('admin.users.delete', compact('user'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('message', $user->name.' has been deleted.');
    }

	public function addRole(User $user) 
	{
		$roles = Role::all();
		return view('admin.users.addrole', compact('user', 'roles'));
	}

	public function assignUserRole(Request $request, User $user) 
	{
		$user->assignRole(Role::find($request->role_id));
		return redirect()->route('admin.users.show', ['user' => $user->id]);
	}

	public function removeRole(User $user, Role $role)
	{
		$user->removeRole($role);
		return redirect()->route('admin.users.show', ['user' => $user->id]);
	}
}