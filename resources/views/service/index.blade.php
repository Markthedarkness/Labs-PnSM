@extends('layouts.app')

@section('title', $pageTitle)

@section('content')
    <h1>{{ $pageTitle }}</h1>

    <p>
        Медичний центр MedCare пропонує широкий спектр послуг для
        дорослих і дітей. Наші лікарі — кваліфіковані спеціалісти
        з багаторічним досвідом роботи.
    </p>

    @if (count($services) > 0)
        <h2>Перелік послуг</h2>

        <div class="services-grid">
            @foreach ($services as $service)
                <div class="service-card">
                    <h3>{{ $service['title'] }}</h3>
                    <p>{{ $service['description'] }}</p>
                    <p>
                        <strong>Ціна:</strong> {{ $service['price'] }}<br>
                        <strong>Тривалість:</strong> {{ $service['duration'] }}
                    </p>
                </div>
            @endforeach
        </div>
    @else
        <p>Наразі перелік послуг порожній.</p>
    @endif

    <h2>Записатися на прийом</h2>
    <p>
        Щоб записатися на консультацію, скористайтеся
        <a href="{{ route('service.contact') }}">формою зворотного зв'язку</a>
        або зателефонуйте нам за номером
        <strong>{{ $clinicPhone }}</strong>.
    </p>

    <style>
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            margin: 20px 0 30px;
        }
        .service-card {
            background-color: #f8fbfe;
            border-left: 4px solid #1488d8;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(11, 111, 184, 0.06);
        }
        .service-card h3 {
            color: #0b6fb8;
            margin-bottom: 10px;
            font-size: 18px;
        }
        .service-card p {
            color: #35485c;
            font-size: 14px;
            margin-bottom: 8px;
        }
    </style>
@endsection
