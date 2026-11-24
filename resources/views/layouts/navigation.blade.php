<nav>
    @auth
        <span>Вітаємо, {{ auth()->user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit">Вийти</button>
        </form>
    @else
        <a href="{{ route('login') }}">Увійти</a>
        <a href="{{ route('register') }}">Реєстрація</a>
    @endauth
</nav>
