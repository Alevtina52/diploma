<form method="POST" action="{{ route('fires.store') }}">
    @csrf

    <label>Район</label>
    <select name="district_id" required>
        @foreach($districts as $district)
            <option value="{{ $district->id }}"
                {{ isset($selectedDistrict) && $selectedDistrict == $district->id ? 'selected' : '' }}>
                {{ $district->name }}
            </option>
        @endforeach
    </select>

    <label>Площадь (га)</label>
    <input type="number" name="area" step="0.01" required>

    <label>Статус</label>
    <select name="status" required>
        <option value="active">Активный</option>
        <option value="closed">Ликвидирован</option>
    </select>

    <label>Дата пожара</label>
    <input type="date" name="fire_date" required>

    <button type="submit">Сохранить</button>
</form>
