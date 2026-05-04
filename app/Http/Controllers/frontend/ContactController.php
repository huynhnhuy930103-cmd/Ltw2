<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{

    public function index()
    {
        return view('frontend.contact');
    }
   public function store(Request $request)
{
   $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|max:150',
        'phone' => 'nullable|regex:/^[0-9]{9,11}$/',
        'title' => 'required|string|max:255',
        'content' => 'required|string|min:10',
    ], [
        'name.required' => 'Vui lòng nhập họ tên',
        'email.required' => 'Vui lòng nhập email',
        'email.email' => 'Email không hợp lệ',
        'phone.regex' => 'Số điện thoại phải từ 9-11 chữ số',
        'title.required' => 'Vui lòng nhập tiêu đề',
        'content.required' => 'Vui lòng nhập nội dung',
        'content.min' => 'Nội dung phải ít nhất 10 ký tự',
    ]);

    Contact::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'title' => $request->title,
        'content' => $request->content,
        'status' => 1,
        'replay_id' => 0,
    ]);

    return back()->with('success', 'Gửi liên hệ thành công!');
}
}
