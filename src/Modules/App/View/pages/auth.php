<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <style>
        a {
            color: white;
            text-decoration: underline;
        }

        .form-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-form {
            color: white;
            backdrop-filter: blur(50px);
            box-shadow: 0px 0px 100px rgb(1 1 1);
        }

        .input-group-btn {
            padding: 0;
            border: none;
        }

        .login-form {
            width: 100%;
            padding: 5rem;
            box-shadow: 0px 0px 100px rgb(1 1 1);
        }

        @media (max-width: 767px) {
            .login-form {
                padding: 1rem;
                padding-top: 3rem;
                padding-bottom: 3rem;
            }
        }
    </style>
</head>

<body
    style="background-image: url(https://images.unsplash.com/photo-1549928619-dec5c56266eb?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                <div class="form-wrapper ">
                    <form class="login-form">
                        <div class="form-group">
                            <a href="/">&#x2190; go Main</a>
                        </div>
                        <h2 class="text-center">Авторизация</h2>
                        <p class="text-center">Пожалуйста, авторизуйтесь</p>
                        <div class="form-group">
                            <label for="login">Логин</label>
                            <input type="text" class="form-control" id="login" placeholder="Введите логин">
                        </div>
                        <div class="form-group">
                            <label for="login">Пароль</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" placeholder="Введите пароль">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary">Войти</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Чужой ПК
                                </label>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <a href="#">Забыли пароль?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>