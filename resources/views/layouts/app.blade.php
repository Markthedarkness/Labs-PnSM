<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'MedCare — Система управління охороною здоров\'я')</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Arial, sans-serif;
            background-color: #eef4f9;
            color: #1f2d3d;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ===== ХЕДЕР ===== */
        header {
            background: linear-gradient(90deg, #0b6fb8 0%, #1488d8 100%);
            color: #fff;
            padding: 0 40px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 10px rgba(11, 111, 184, 0.25);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 22px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .logo-icon {
            width: 38px;
            height: 38px;
            background-color: #fff;
            color: #0b6fb8;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            font-weight: 900;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.25);
        }

        nav {
            display: flex;
            align-items: center;
            height: 70px;
        }

        nav a {
            color: #e8f3fb;
            text-decoration: none;
            font-weight: 500;
            padding: 0 18px;
            height: 70px;
            line-height: 70px;
            transition: background-color 0.2s ease, color 0.2s ease;
            border-bottom: 3px solid transparent;
        }

        nav a:hover {
            background-color: rgba(255, 255, 255, 0.12);
            color: #fff;
            border-bottom-color: #7fd6a6;
        }

        /* ===== ОСНОВНИЙ ВМІСТ ===== */
        main {
            flex: 1;
            max-width: 1000px;
            width: 100%;
            margin: 40px auto;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(11, 111, 184, 0.08);
            border-top: 4px solid #0b6fb8;
        }

        main h1 {
            color: #0b6fb8;
            font-size: 30px;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 2px solid #e1eef8;
        }

        main h2 {
            color: #1488d8;
            font-size: 22px;
            margin: 24px 0 12px;
        }

        main p {
            margin-bottom: 12px;
            color: #35485c;
        }

        main ul {
            margin: 10px 0 18px 24px;
            color: #35485c;
        }

        main li {
            margin-bottom: 6px;
        }

        .badge {
            display: inline-block;
            background-color: #e6f4ec;
            color: #1e7a4d;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 16px;
        }

        /* ===== ФУТЕР ===== */
        footer {
            background-color: #0b3a5e;
            color: #b8d3e8;
            padding: 30px 40px 20px;
            font-size: 14px;
        }

        .footer-content {
            max-width: 1000px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
        }

        .footer-block h4 {
            color: #ffffff;
            margin-bottom: 8px;
            font-size: 15px;
            letter-spacing: 0.4px;
        }

        .footer-block p,
        .footer-block a {
            color: #b8d3e8;
            text-decoration: none;
            font-size: 14px;
            margin-bottom: 4px;
            display: block;
        }

        .footer-block a:hover {
            color: #7fd6a6;
        }

        .footer-bottom {
            max-width: 1000px;
            margin: 22px auto 0;
            padding-top: 16px;
            border-top: 1px solid #1a5480;
            text-align: center;
            font-size: 13px;
            color: #8fb8d4;
        }
    </style>
</head>
<body>

<header>
    <div class="logo">
        <div class="logo-icon">+</div>
        MedCare
    </div>
    <nav>
        <a href="{{ route('site.say', ['message' => 'Вітаю']) }}">Говоримо привіт</a>
        <a href="{{ route('appointment.index') }}">Послуги</a>
        <a href="{{ route('entry.form') }}">Форма</a>
        <a href="{{ route('site.about') }}">Про систему</a>
        <a href="{{ route('site.contact') }}">Контакти</a>
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer>
    <div class="footer-content">
        <div class="footer-block">
            <h4>MedCare</h4>
            <p>Система управління охороною здоров'я</p>
            <p>Версія 1.0</p>
        </div>
        <div class="footer-block">
            <h4>Контакти</h4>
            <p>м. Київ, вул. Медична, 1</p>
            <p>+38 (044) 123-45-67</p>
            <a href="mailto:info@medcare.ua">info@medcare.ua</a>
        </div>
        <div class="footer-block">
            <h4>Розробник</h4>
            <p>Бабіцький М.В.</p>
            <p>група РЕ-п41</p>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; {{ date('Y') }} MedCare — КПІ ім. Ігоря Сікорського. Усі права захищено.
    </div>
</footer>

</body>
</html>
