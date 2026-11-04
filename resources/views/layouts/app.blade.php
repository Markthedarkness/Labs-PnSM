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
        /* ===== Пагінація ===== */
        nav[role="navigation"] {
            margin-top: 24px;
            display: flex;
            justify-content: center;
        }

        nav[role="navigation"] > div:first-child {
            display: none; /* Ховаємо "Showing X to Y of Z results" */
        }

        nav[role="navigation"] > div:last-child {
            display: flex;
            align-items: center;
            gap: 6px;
            flex-wrap: wrap;
        }

        nav[role="navigation"] a,
        nav[role="navigation"] span[aria-current="page"] > span,
        nav[role="navigation"] span[aria-disabled="true"] > span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 36px;
            height: 36px;
            padding: 0 10px;
            border: 1px solid #c9d9e6;
            border-radius: 6px;
            background-color: #ffffff;
            color: #0b6fb8;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            transition: background-color 0.2s ease, color 0.2s ease, border-color 0.2s ease;
        }

        nav[role="navigation"] a:hover {
            background-color: #e8f3fb;
            border-color: #1488d8;
        }

        nav[role="navigation"] span[aria-current="page"] > span {
            background-color: #0b6fb8;
            color: #ffffff;
            border-color: #0b6fb8;
            font-weight: 600;
        }

        nav[role="navigation"] span[aria-disabled="true"] > span {
            background-color: #f4f6f8;
            color: #a8b8c6;
            border-color: #e1eef8;
            cursor: not-allowed;
        }

        nav[role="navigation"] svg {
            width: 16px;
            height: 16px;
            fill: currentColor;
        }

        /* ===== Таблиця ===== */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
            font-size: 14px;
        }

        table thead th {
            text-align: left;
            padding: 10px 12px;
            background-color: #f4f9fd;
            color: #0b3a5e;
            font-weight: 600;
            border-bottom: 2px solid #d7e6f2;
        }

        table tbody td {
            padding: 10px 12px;
            border-bottom: 1px solid #e8f0f7;
            color: #35485c;
        }

        table tbody tr:hover {
            background-color: #f8fbfe;
        }

        table a {
            color: #0b6fb8;
            text-decoration: none;
            font-weight: 500;
        }

        table a:hover {
            text-decoration: underline;
        }

        /* ===== Форма ===== */
        form div {
            margin-bottom: 16px;
        }

        form label {
            display: block;
            font-weight: 600;
            color: #1f2d3d;
            margin-bottom: 6px;
        }

        form input[type="text"],
        form input[type="number"] {
            width: 100%;
            max-width: 400px;
            padding: 9px 12px;
            border: 1px solid #c9d9e6;
            border-radius: 6px;
            font-size: 14px;
            font-family: inherit;
        }

        form input:focus {
            outline: none;
            border-color: #1488d8;
            box-shadow: 0 0 0 3px rgba(20, 136, 216, 0.15);
        }

        form button[type="submit"] {
            background-color: #0b6fb8;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        form button[type="submit"]:hover {
            background-color: #1488d8;
        }

        .error {
            color: #c0392b;
            font-size: 13px;
            margin-top: 4px;
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
        <a href="{{ route('country.index') }}">Країни</a>
        <a href="{{ route('patient.index') }}">Пацієнти</a>
        <a href="{{ route('stats.pages') }}">Статистика</a>
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
