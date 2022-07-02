<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if(app('env') == 'production')
    <link rel="stylesheet" href="{{ secure_asset('css\reset.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css\adminLogin.css') }}">
    @else
    <link rel="stylesheet" href="{{ asset('css\reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css\adminLogin.css') }}">
    @endif
    <title>管理者Login</title>
</head>
<body>
    <div class="login">
        <h2>管理者Login</h2>
        <form action="{{ route('admin.login') }}" method="post">
        @csrf
            <div>
                <img src="/storage/mail.png" alt="メールのアイコン">
                <input type="email" name="email">
            </div>
            <div>
            <img src="/storage/lock.png" alt="パスワードのアイコン">
                <input type="password" name="password">
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>