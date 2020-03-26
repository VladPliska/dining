@include('includes/head')
@include('includes/header')


<div class="login-container">
    <div class="title-login">Вхід</div>
    <form action="/login" class="auth-form" method="POST">
        <div class="login">
            <label for="login">Введіть нік</label><br>
            <input id='login' type="text" name='username' placeholder="Введіть нік">
        </div>
        <br>
        <div class="password">
            <label for="pass">Введіть пароль</label><br>
            <input id='pass' type="password" name="pass" placeholder="password">
        </div>
        <button class='login-btn' type="submit">Login</button>
    </form>

</div>


@include('includes/footer')
