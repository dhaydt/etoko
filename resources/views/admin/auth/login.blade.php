<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Web</title>
</head>
<body>
    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Email Address" required>
        </div>
        <div class="form-group">
            <label for="password">
                Password
            </label>
            <input type="password" name="password" placeholder="Your Password" required>
        </div>
        <button class="btn btn-primary" type="submit">Login</button>
    </form>
</body>
</html>
