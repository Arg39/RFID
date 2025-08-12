@extends('templates.template', ['withSidebar' => true, 'activeMenu' => 'dashboard'])

@section('style')
    {{-- style --}}
@endsection

@section('container')
    <div class="p-4">
        <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
        <p>Selamat datang, {{ Auth::user()->name ?? 'User' }}!</p>
    </div>
@endsection

@section('script')
    {{-- script --}}
@endsection
