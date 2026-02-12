<h1>Список пожаров</h1>

<a href="{{ route('fires.create') }}">Добавить пожар</a>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>Район</th>
        <th>Площадь</th>
        <th>Статус</th>
        <th>Дата</th>
        <th>Действия</th>
    </tr>

    @foreach($fires as $fire)
        <tr>
            <td>{{ $fire->district->name }}</td>
            <td>{{ $fire->area }}</td>
            <td>{{ $fire->status }}</td>
            <td>{{ $fire->fire_date }}</td>
            <td>
                <a href="{{ route('fires.edit', $fire) }}">Редактировать</a>

                <form action="{{ route('fires.destroy', $fire) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
