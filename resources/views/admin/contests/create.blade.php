<h1>Создание конкурса</h1>

@if($errors->any())
    <div style="color:red">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.contests.store') }}"
      method="POST"
      enctype="multipart/form-data">
    @csrf

    <div>
        <label>Название:</label>
        <input type="text" name="title" value="{{ old('title') }}" required>
    </div>

    <div>
        <label>Описание:</label>
        <textarea name="description" required>{{ old('description') }}</textarea>
    </div>

    <div>
        <label>Изображение:</label>
        <input type="file" name="image">
    </div>

    <div>
        <label>Дата начала:</label>
        <input type="date" name="start_date" required>
    </div>

    <div>
        <label>Дата окончания:</label>
        <input type="date" name="end_date" required>
    </div>

    <div>
        <label>
            <input type="checkbox" name="is_active" value="1" checked>
            Активен
        </label>
    </div>

    <button type="submit">Создать конкурс</button>
</form>
