<h1>Список конкурсов</h1>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<a href="{{ route('admin.contests.create') }}">
    Создать новый конкурс
</a>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Название</th>
        <th>Период</th>
        <th>Статус</th>
    </tr>

    @foreach($contests as $contest)
        <tr>
            <td>{{ $contest->id }}</td>
            <td>{{ $contest->title }}</td>
            <td>
                {{ $contest->start_date->format('d.m.Y') }}
                -
                {{ $contest->end_date->format('d.m.Y') }}
            </td>
            <td>
                {{ $contest->is_active ? 'Активен' : 'Неактивен' }}
            </td>
        </tr>
    @endforeach
</table>

{{ $contests->links() }}
