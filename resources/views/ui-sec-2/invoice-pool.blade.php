@extends('layouts.app')

@section('content')

    <div id="app">
        <invoice-pool :user="'{{ auth()->user()->name }}'"></invoice-pool>
    </div>

@endsection

@section('javascript')
    <script src="{{ asset('js/invoice-pool.js') }}"></script>
@endsection


