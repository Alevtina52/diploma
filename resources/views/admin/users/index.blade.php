<h2>Список пользователей</h2>

<a href="{{ route('admin.users.create') }}">
    Создать пользователя
</a>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1">
    <tr>
        <th>ID</th>
        <th>Имя</th>
        <th>Логин</th>
        <th>Роль</th>
    </tr>

    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->login }}</td>
            <td>{{ $user->role }}</td>
        </tr>
    @endforeach
</table>
