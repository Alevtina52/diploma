@extends('layouts.app')

@section('title', 'Интерактивная карта')

@section('content')
    <div class="map-wrapper">
        @include('svg.tomsk_map')
    </div>

    <!-- Модальное окно -->
    <div id="districtModal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="districtTitle"></h2>
            <div id="districtInfo"></div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const districtData = @json($districtData);
    </script>
    <script src="{{ asset('js/map.js') }}"></script>
@endpush
