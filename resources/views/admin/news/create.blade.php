<form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
    @csrf

    <input type="text" name="title" placeholder="Заголовок" required>

    <textarea name="content" placeholder="Текст новости" required></textarea>

    <input type="file" name="image">

    <select name="status">
        <option value="draft">Черновик</option>
        <option value="published">Опубликована</option>
        <option value="scheduled">Отложена</option>
        <option value="archived">В архив</option>
    </select>

    <input type="datetime-local" name="publish_at">

    <button type="submit">Создать</button>
</form>
