@extends('layouts.app')

@php
    $features = [
        [
            'icon' => 'fa-circle-check',
            'title' => 'Gratis',
            'description' => 'Addons dapat diunduh tanpa biaya.',
        ],
        [
            'icon' => 'fa-image',
            'title' => 'Karya Original',
            'description' => 'Model dibuat dan dikurasi oleh tim NRATrainz.',
        ],
        [
            'icon' => 'fa-download',
            'title' => 'Mudah Diakses',
            'description' => 'Download bisa melalui website atau WhatsApp bot.',
        ],
    ];
@endphp

@section('content')
    <section
        class="relative flex min-h-screen items-center justify-center overflow-hidden px-6 pt-28 pb-20 text-background sm:px-8 lg:px-12">
        <div class="absolute inset-0 bg-cover bg-center blur-[3px] scale-105"
            style="background-image: url('{{ asset('images/bg-navbar.webp') }}');"></div>
        <div class="absolute inset-0 bg-slate-900/35"></div>

        <div class="relative z-10 mx-auto flex max-w-5xl flex-col items-center text-center">
            <h1 class="text-5xl font-bold tracking-tight sm:text-7xl lg:text-[5.5rem]">NRATrainz</h1>
            <p class="mt-4 max-w-2xl text-sm text-background/90 sm:text-lg">
                Penyedia addons “kecil-kecilan” untuk Trainz Simulator
            </p>
            <a href="#welcome"
                class="mt-7 inline-flex items-center rounded-md border border-background/80 bg-background/10 px-5 py-3 text-sm font-medium text-background shadow-lg shadow-black/10 backdrop-blur-sm transition hover:bg-background hover:text-primary-950">
                Lihat Selengkapnya
            </a>
        </div>
    </section>

    <section id="welcome" class="bg-white">
        <div class="relative">
            <img src="{{ asset('images/welcome-trainzer.webp') }}" alt="Koleksi addons Trainz"
                class="h-auto w-full object-cover" />

            <div class="flex flex-col items-center text-center z-10 absolute inset-0 mt-8">
                <h2 class="text-4xl font-bold tracking-tight text-white sm:text-5xl z-10">Welcome Trainzer!</h2>
                <span class="mt-2 h-0.5 w-28 rounded-full bg-white/90 z-10"></span>
            </div>
        </div>

        <p class="mx-auto mt-8 max-w-4xl text-center text-sm leading-7 text-slate-600 sm:text-base z-10">
            Di sini, kalian bisa mendownload addons objek dan rute yang kami buat. Objek yang kami buat boleh
            dimasukkan ke dalam pelengkap (dependencies) pada rute apapun. Entah itu free, pay, PLU, maupun private.
        </p>

        <div class="mx-auto mt-10 h-px max-w-6xl bg-slate-200"></div>

        <div class="mt-10 px-32 grid gap-5 md:grid-cols-3">
            @foreach ($features as $feature)
                <article
                    class="z-10 rounded-2xl border border-primary-900/35 px-8 py-9 text-center shadow-[0_8px_30px_rgba(15,23,42,0.05)] transition hover:-translate-y-1 hover:shadow-[0_14px_35px_rgba(15,23,42,0.08)]">
                    <i class="fa-solid {{ $feature['icon'] }} text-4xl text-primary-900"></i>
                    <h3 class="mt-5 text-3xl font-bold text-primary-950">{{ $feature['title'] }}</h3>
                    <p class="mt-3 text-sm leading-6 text-slate-600 sm:text-base">{{ $feature['description'] }}</p>
                </article>
            @endforeach
        </div>
    </section>

    <section class="bg-white py-12 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-6 sm:px-8">
            <h2 class="text-4xl font-bold tracking-tight text-primary-950 sm:text-5xl">Apa yang baru?</h2>

            <div class="mt-8 grid gap-6 lg:grid-cols-2">
                @forelse ($latestAddons as $addon)
                    <article class="group relative overflow-hidden rounded-xl shadow-[0_18px_40px_rgba(15,23,42,0.18)]">
                        <img src="{{ $addon['image'] }}" alt="{{ $addon['title'] }}"
                            class="h-72 w-full object-cover transition duration-500 group-hover:scale-105 sm:h-80" />
                        <div class="absolute inset-0 bg-linear-to-t from-black via-black/45 to-transparent"></div>
                        <div class="absolute inset-x-0 bottom-0 p-6 text-white">
                            <div class="flex flex-wrap items-center gap-3">
                                <h3 class="text-2xl font-bold sm:text-4xl">{{ $addon['title'] }}</h3>
                                <span
                                    class="rounded-full bg-primary-900 px-3 py-1 text-xs font-medium uppercase tracking-[0.2em]">
                                    {{ $addon['type'] }}
                                </span>
                            </div>
                            <div class="mt-5 flex flex-wrap gap-3">
                                <a href="#"
                                    class="inline-flex min-w-28 items-center justify-center rounded-md bg-primary-900 px-4 py-3 text-sm font-medium transition hover:bg-primary-500">
                                    Download
                                </a>
                                <a href="#"
                                    class="inline-flex min-w-24 items-center justify-center rounded-md border border-white/80 bg-white/10 px-4 py-3 text-sm font-medium backdrop-blur-sm transition hover:bg-white hover:text-primary-950">
                                    Detail
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <p class="text-center text-slate-500">Tidak ada addon terbaru.</p>
                @endforelse
            </div>

            <div class="mt-8 flex justify-center">
                <a href="#"
                    class="inline-flex items-center rounded-md bg-primary-950 px-5 py-3 text-sm font-medium text-white transition hover:bg-primary-900">
                    Unduh Lainnya
                </a>
            </div>

            <div class="mx-auto mt-10 h-px max-w-6xl bg-slate-200"></div>
        </div>
    </section>

    <section class="bg-white py-12 sm:py-16 lg:py-20">
        <div class="mx-auto grid max-w-7xl gap-10 px-6 sm:px-8 lg:grid-cols-[1.05fr_1fr] lg:items-center">
            <div>
                <img src="{{ asset('images/tentang-kami.webp') }}" alt="Tentang NRATrainz"
                    class="h-full w-full rounded-tr-4xl rounded-br-4xl object-cover shadow-[0_20px_50px_rgba(15,23,42,0.14)]" />
                <p class="mt-5 text-sm italic text-slate-500">Loko: KAI, Gerbong: GETA, Rute: NRATrainz</p>
            </div>

            <div class="max-w-xl">
                <h2 class="text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl">Tentang Kami</h2>
                <span class="mt-5 block h-0.5 w-24 rounded-full bg-primary-900/50"></span>
                <p class="mt-8 text-base leading-8 text-slate-600">
                    NRATrainz adalah proyek pribadi yang menyediakan addons bertema perkeretaapian Indonesia untuk Trainz
                    Simulator.
                </p>
                <a href="#"
                    class="mt-10 inline-flex items-center rounded-md bg-primary-950 px-5 py-3 text-sm font-medium text-white transition hover:bg-primary-900">
                    Baca Cerita NRATrainz
                </a>
            </div>
        </div>
    </section>
@endsection
