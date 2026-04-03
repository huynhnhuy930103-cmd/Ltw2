<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereNull('deleted_at')->latest()->get();
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
            'created_by' => Auth::id() ?? 1,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('user.index');
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('backend.user.show', compact('user'));
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('backend.user.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'username' => $request->username,
            'address' => $request->address,
            'image' => $request->image,
            'roles' => $request->roles,
            'updated_by' => Auth::id() ?? 1,
            'status' => $request->status,
        ]);

        if ($request->password) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
        }

        return redirect()->route('user.index');
    }

    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();
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
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();

        return redirect()->route('admin.user.trash');
    }
    // DELETE FORCE
    public function delete($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->forceDelete();

        return back();
    }

    // STATUS TOGGLE
    public function status(string $id)
    {
        $user = User::findOrFail($id);
        $user->status = $user->status == 1 ? 2 : 1;
        $user->save();

        return back();
    }
}
