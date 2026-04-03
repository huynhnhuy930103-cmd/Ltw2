<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    // ================== LIST ==================
    public function index(Request $request)
    {
        $query = Contact::latest();

        if ($request->keyword) {
            $query->where('name', 'like', '%' . $request->keyword . '%')
                ->orWhere('email', 'like', '%' . $request->keyword . '%')
                ->orWhere('phone', 'like', '%' . $request->keyword . '%')
                ->orWhere('title', 'like', '%' . $request->keyword . '%');
        }

        $contacts = $query->paginate(10)->withQueryString();

        return view('backend.contact.index', compact('contacts'));
    }

    // ================== CREATE ==================
    public function create()
    {
        return view('backend.contact.create');
    }

    // ================== STORE ==================
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'phone'   => 'required',
            'content' => 'required',
        ]);

        Contact::create([
            'user_id' => $request->input('user_id'),
            'name'    => $request->input('name'),
            'email'   => $request->input('email'),
            'phone'   => $request->input('phone'),
            'title'   => $request->input('title'),
            'content' => $request->input('content'),
            'replay_id'  => 0,
            'status'     => 2, // pending
            'updated_by' => null,
        ]);

        return redirect()->route('contact.index')
            ->with('success', 'Tạo contact thành công');
    }

    // ================== SHOW ==================
    public function show($id)
    {
        $contact = Contact::findOrFail($id);

        return view('backend.contact.show', compact('contact'));
    }

    // ================== EDIT ==================
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);

        return view('backend.contact.edit', compact('contact'));
    }

    // ================== UPDATE ==================
    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'phone'   => 'required',
            'content' => 'required',
        ]);

        $contact->update([
            'user_id'    => $request->input('user_id') ?? $contact->user_id,
            'name'       => $request->input('name'),
            'email'      => $request->input('email'),
            'phone'      => $request->input('phone'),
            'title'      => $request->input('title'),
            'content'    => $request->input('content'),
            'updated_by' => Auth::id() ?? 1,
        ]);

        return redirect()->route('contact.index')
            ->with('success', 'Cập nhật contact thành công');
    }

    // ================== DELETE (SOFT DELETE) ==================
    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();

        return back()->with('success', 'Đã chuyển vào thùng rác');
    }

    // ================== TRASH ==================
    public function trash()
    {
        $contacts = Contact::onlyTrashed()
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('backend.contact.trash', compact('contacts'));
    }

    // ================== RESTORE ==================
    public function restore($id)
    {
        Contact::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('contact.index')
            ->with('success', 'Khôi phục thành công');
    }

    // ================== FORCE DELETE ==================
    public function delete($id)
    {
        Contact::withTrashed()->findOrFail($id)->forceDelete();

        return back()->with('success', 'Xóa vĩnh viễn thành công');
    }

    // ================== STATUS TOGGLE ==================
    public function status($id)
    {
        $contact = Contact::findOrFail($id);

        // 2 = pending, 1 = processed
        $contact->status = $contact->status == 1 ? 2 : 1;

        $contact->save();

        return back();
    }
}
