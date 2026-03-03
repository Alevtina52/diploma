<h1>Конкурсы</h1>

@foreach($contests as $contest)
    <div style="border:1px solid #ccc; padding:15px; margin-bottom:15px;">
        <h2>{{ $contest->title }}</h2>

        <p>
            Период:
            {{ $contest->start_date->format('d.m.Y') }}
            —
            {{ $contest->end_date->format('d.m.Y') }}
        </p>

        <a href="{{ route('contests.show', $contest) }}">
            Подробнее
        </a>
    </div>
@endforeach
