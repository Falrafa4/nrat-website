@extends('layouts.app')

@section('content')
    <header class="relative h-screen overflow-hidden px-4 flex flex-col items-center justify-center font-header text-background">
        <div class="absolute inset-0 scale-110 bg-cover bg-center blur-sm z-5"
            style="background-image: url('{{ asset('images/bg-navbar.png') }}');"></div>
        <h1 class="relative z-10 text-8xl font-bold">NRATrainz</h1>
        <p class="relative z-10 mt-4 text-xl"> Penyedia addons “kecil-kecilan” untuk Trainz Simulator</p>
        <x-button>Lihat Koleksi</x-button>
    </header>
@endsection
