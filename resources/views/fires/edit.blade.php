@extends('layouts.app')

@section('title', 'Редактирование пожара')

@section('content')

    <h2>Редактировать пожар</h2>

    <form method="POST" action="{{ route('fires.update', $fire->id) }}">
        @csrf
        @method('PUT')

        <label>Район</label>
        <select name="district_id">
            @foreach($districts as $district)
                <option value="{{ $district->id }}"
                    {{ $fire->district_id == $district->id ? 'selected' : '' }}>
                    {{ $district->name }}
                </option>
            @endforeach
        </select>

        <label>Площадь</label>
        <input type="number" name="area" value="{{ $fire->area }}" step="0.01">

        <label>Статус</label>
        <select name="status">
            <option value="active" {{ $fire->status == 'active' ? 'selected' : '' }}>Активный</option>
            <option value="closed" {{ $fire->status == 'closed' ? 'selected' : '' }}>Ликвидирован</option>
        </select>

        <label>Дата</label>
        <input type="date" name="fire_date" value="{{ $fire->fire_date }}">

        <button type="submit">Обновить</button>
    </form>

@endsection
