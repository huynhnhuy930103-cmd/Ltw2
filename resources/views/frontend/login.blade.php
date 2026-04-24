<form method="POST" action="{{ route('site.doLogin') }}">
    @csrf

    <input type="text" name="username" placeholder="Email hoặc Username">
    <input type="password" name="password" placeholder="Mật khẩu">

    <button type="submit">Đăng nhập</button>

    @if(session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif
</form>
