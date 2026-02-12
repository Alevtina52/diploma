@extends('layouts.app')

@section('title', 'Административная карта')

@section('content')

    <h2>Административная карта</h2>

    <div class="map-wrapper">
        @include('svg.tomsk_map')
    </div>

    <div id="districtModal" class="modal" style="display:none;">
        <div class="modal-content">
            <span id="closeModal">✖</span>

            <h3 id="districtName"></h3>

            <a id="addFireBtn" href="#">
                <button>Добавить пожар</button>
            </a>

            <a id="listFireBtn" href="#">
                <button>Список пожаров</button>
            </a>
        </div>
    </div>


@endsection

@push('scripts')
    <script>
        const baseUrl = "{{ url('/') }}";
    </script>
    <script src="{{ asset('js/admin-map.js') }}"></script>
@endpush
