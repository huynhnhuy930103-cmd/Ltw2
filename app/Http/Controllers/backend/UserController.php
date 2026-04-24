<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('backend.user.index', compact('users'));
    }

    public function create()
    {
        return view('backend.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'username' => 'required',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'image' => $request->image,
            'roles' => $request->roles ?? 'user',
            'status' => $request->status ?? 1,
            'created_by' => Auth::id() ?? 1,
        ]);

        return redirect()->route('user.index');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('backend.user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'username' => $request->username,
            'address' => $request->address,
            'image' => $request->image,
            'roles' => $request->roles,
            'status' => $request->status,
            'updated_by' => Auth::id() ?? 1,
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete(); // soft delete
        return redirect()->route('user.index');
    }

    // TRASH
    public function trash()
    {
        $users = User::onlyTrashed()->get();
        return view('backend.user.trash', compact('users'));
    }

    // RESTORE
    public function restore($id)
    {
        User::onlyTrashed()->findOrFail($id)->restore();

        return redirect()->route('admin.user.trash');
    }

    // FORCE DELETE
    public function delete($id)
    {
        User::onlyTrashed()->findOrFail($id)->forceDelete();

        return back();
    }

    // STATUS TOGGLE
    public function status($id)
    {
        $user = User::findOrFail($id);
        $user->status = $user->status == 1 ? 2 : 1;
        $user->save();

        return back();
    }
}
