<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoundSpace - Регистрация</title>
    <link rel="stylesheet" href="/css/SignInUp.css">
    <script src="/js/SignInUp.js" defer></script>
</head>
<body>
    
    <!-- Контейнер -->
    <article class="container">
        <!-- Внутренний блок -->
        <div class="block">
            <section class="block__item block-item">
                <h2 class="block-item__title">У вас уже есть аккаунт?</h2>
                <button class="block-item__btn signin-btn">Войти</button>
            </section>
            <section class="block__item block-item">
                <h2 class="block-item__title1">У вас нет аккаунта?</h2>
                <button class="block-item__btn1 signup-btn">Зарегистрироваться</button>
            </section>
        </div>
        
        <!-- Форма -->
        <div class="form-box">
            <!-- Форма фхода -->
            <form action="#" class="form form_signin">
                <h3 class="form__title">Вход</h3>
                <p>
                    <input type="email" class="form__input" placeholder="Email">
                </p>
                <p>
                    <input type="password" class="form__input" placeholder="Пароль">
                </p>
                <p>
                    <button class="form__btn">Войти</button>
                </p>
                <p>
                    <a href="" class="form__forgot">Восстановление пароля</a>
                </p>
            </form>    

            <!-- Форма регистрации -->
            <form action="#" class="form form_signup">
                <h3 class="form__title">Регистрация</h3>
                <p>
                    <input type="Name" class="form__input" placeholder="Имя">
                </p>
                <p>
                    <input type="Surname" class="form__input" placeholder="Фамилия">
                </p>
                <p>
                    <input type="Patronymic" class="form__input" placeholder="Отчество">
                </p>
                <p>
                    <input type="PhoneNumber" class="form__input" placeholder="Телефон">
                </p>
                <p>
                    <input type="email" class="form__input" placeholder="Email">
                </p>
                <p>
                    <input type="password" class="form__input" placeholder="Пароль">
                </p>
                <p>
                    <button class="form__btn form__btn_signup">Зарегистрироваться</button>
                </p>
            </form> 
        </div>
    </article>
</body>
</html>