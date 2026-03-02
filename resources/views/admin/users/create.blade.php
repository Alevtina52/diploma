<form method="POST" action="{{ route('admin.users.store') }}">
    @csrf

    <label>Имя</label>
    <input type="text" name="name">
    @error('name') <div>{{ $message }}</div> @enderror

    <label>Логин</label>
    <input type="text" name="login">
    @error('login') <div>{{ $message }}</div> @enderror

    <label>Пароль</label>
    <input type="password" name="password">

    <label>Подтверждение пароля</label>
    <input type="password" name="password_confirmation">
    @error('password') <div>{{ $message }}</div> @enderror

    <label>Роль</label>
    <select name="role">
        <option value="user">Пользователь</option>
        <option value="admin">Администратор</option>
    </select>

    <button type="submit">Создать</button>
</form>
