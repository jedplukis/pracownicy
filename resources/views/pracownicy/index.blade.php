@extends('layouts.app')

@section('content')
    <table class="table" id="workers-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Email</th>
            <th>Firma</th>
            <th>Dieta</th>
            <th>Telefon 1</th>
            <th>Telefon 2</th>
            <th>Actions</th>
        </tr>
        </thead>
    </table>

    @include('modals/success')
    @include('modals/create')

    <!-- Create Button -->
    <button type="button" id="openCreateForm" class="btn btn-primary">
        Dodaj pracownika +
    </button>

    <script type="text/javascript" src="{{ asset('js/delete.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/createOrUpdate.js') }}"></script>
{{--    //<script type="text/javascript" src="{{ asset('js/update.js') }}"></script>--}}
    <script type="text/javascript" src="{{ asset('js/index.js') }}"></script>

@endsection
