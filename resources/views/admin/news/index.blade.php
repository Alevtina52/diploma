<h1>Список новостей</h1>

<a href="{{ route('admin.news.create') }}">Создать новость</a>

<table border="1" cellpadding="10">
    <thead>
    <tr>
        <th>ID</th>
        <th>Изображение</th>
        <th>Заголовок</th>
        <th>Автор</th>
        <th>Статус</th>
        <th>Дата публикации</th>
        <th>Действия</th>
    </tr>
    </thead>
    <tbody>
    @foreach($news as $item)
        <tr>
            <td>{{ $item->id }}</td>

            <td>
                @if($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}" width="80">
                @endif
            </td>

            <td>{{ $item->title }}</td>

            <td>{{ $item->author->name ?? '—' }}</td>

            <td>
                @switch($item->status)
                    @case('draft') Черновик @break
                    @case('published') Опубликована @break
                    @case('scheduled') Отложена @break
                    @case('archived') Архив @break
                @endswitch
            </td>

            <td>
                {{ $item->publish_at ? $item->publish_at->format('d.m.Y H:i') : '—' }}
            </td>

            <td>
                <a href="{{ route('admin.news.edit', $item) }}">Редактировать</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<br>

{{ $news->links() }}
