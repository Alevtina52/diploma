@if ($errors->any())
    <div style="color: red; margin-bottom: 15px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('fires.store') }}">
    @csrf

    <label>Район</label>
    <select name="district_id" >
        @foreach($districts as $district)
            <option value="{{ $district->id }}"
                {{ isset($selectedDistrict) && $selectedDistrict == $district->id ? 'selected' : '' }}>
                {{ $district->name }}
            </option>
        @endforeach
    </select>

    <label>Площадь (га)</label>
    <input type="number" name="area" step="0.01" >

    <label>Статус</label>
    <select name="status" >
        <option value="active">Активный</option>
        <option value="closed">Ликвидирован</option>
    </select>

    <label>Дата пожара</label>
    <input type="date" name="fire_date" >

    <button type="submit">Сохранить</button>
</form>
