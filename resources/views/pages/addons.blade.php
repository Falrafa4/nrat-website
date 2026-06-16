@extends('layouts.app')

@section('title', 'My Content - NRATrainz')

@section('content')
    <section class="relative overflow-hidden px-6 pt-28 pb-20 text-background sm:px-8 lg:px-12">
        <div class="absolute inset-0 bg-cover bg-center blur-[3px] scale-105"
            style="background-image: url('{{ asset('images/bg-navbar.webp') }}');"></div>
        <div class="absolute inset-0 bg-slate-950/45"></div>

        <div class="relative z-10 mx-auto max-w-7xl">
            <div
                class="max-w-3xl rounded-3xl border border-white/15 bg-white/10 p-8 shadow-[0_20px_60px_rgba(15,23,42,0.28)] backdrop-blur-md sm:p-10">
                <p class="text-sm font-semibold uppercase tracking-[0.35em] text-background/80">My Content</p>
                <h1 class="mt-4 text-5xl font-bold tracking-tight sm:text-6xl">Koleksi NRATrainz</h1>
                <p class="mt-5 max-w-2xl text-sm leading-7 text-background/85 sm:text-base">
                    Lihat daftar addon yang tersedia beserta kategori dan tanggal unggahnya dalam tampilan yang selaras
                    dengan halaman utama NRATrainz.
                </p>

                <div class="mt-7 flex flex-wrap gap-3">
                    <x-button href="{{ route('landing') }}"
                        class="px-5 py-3 text-sm border border-background/70 bg-background/10 text-background backdrop-blur-sm hover:bg-background hover:text-primary-950">
                        Kembali ke Home
                    </x-button>
                    <x-button href="#content-list" class="px-5 py-3 text-sm bg-primary-950 text-white hover:bg-primary-500">
                        Lihat Daftar
                    </x-button>
                </div>
            </div>
        </div>
    </section>

    <section id="content-list" class="bg-white py-12 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-6 sm:px-8">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <h2 class="text-4xl font-bold tracking-tight text-slate-950 sm:text-5xl">Addon Tersimpan</h2>
                    <p class="mt-3 text-sm leading-7 text-slate-600 sm:text-base">
                        Setiap kartu menampilkan nama addon, kategori, dan tanggal unggah.
                    </p>
                </div>

                <div
                    class="inline-flex items-center rounded-full border border-primary-950/15 bg-primary-950/5 px-4 py-2 text-sm font-medium text-primary-950">
                    {{ $addons->count() }} item
                </div>
            </div>

            <div class="mt-8 grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
                @forelse ($addons as $addon)
                    <article
                        class="group overflow-hidden rounded-3xl border border-primary-950/10 bg-white shadow-[0_18px_40px_rgba(15,23,42,0.08)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_24px_55px_rgba(15,23,42,0.12)]">
                        <div class="relative">
                            <img src="{{ asset('storage/' . $addon->thumbnail) }}" alt="{{ $addon->title }}"
                                class="h-60 w-full object-cover transition duration-500 group-hover:scale-105" />
                            <div class="absolute inset-0 bg-linear-to-t from-black/65 via-black/10 to-transparent"></div>
                            <div
                                class="absolute left-4 top-4 rounded-full bg-primary-950/90 px-3 py-1 text-xs font-semibold uppercase tracking-[0.22em] text-white backdrop-blur-sm">
                                {{ $addon->category?->name ?? 'Tanpa Kategori' }}
                            </div>
                        </div>

                        <div class="p-5 sm:p-6">
                            <h3 class="text-2xl font-bold tracking-tight text-primary-950">{{ $addon->title }}</h3>

                            <dl class="mt-4 space-y-3 text-sm">
                                <div class="flex items-center justify-between gap-4 border-t border-slate-100 pt-3">
                                    <dt class="text-slate-500">Kategori</dt>
                                    <dd class="text-right font-semibold text-slate-800">
                                        {{ $addon->category?->name ?? '-' }}
                                    </dd>
                                </div>
                                <div class="flex items-center justify-between gap-4 border-t border-slate-100 pt-3">
                                    <dt class="text-slate-500">Tanggal Unggah</dt>
                                    <dd class="text-right font-semibold text-slate-800">
                                        {{ $addon->created_at?->format('d M Y') ?? '-' }}
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </article>
                @empty
                    <div
                        class="col-span-full rounded-3xl border border-dashed border-slate-300 bg-slate-50 px-8 py-16 text-center">
                        <h3 class="text-2xl font-bold text-slate-900">Belum ada addon</h3>
                        <p class="mx-auto mt-3 max-w-xl text-sm leading-7 text-slate-600 sm:text-base">
                            Saat ini belum ada addon yang tersimpan untuk ditampilkan di halaman ini.
                        </p>

                        <x-button href="{{ route('landing') }}"
                            class="mt-6 px-5 py-3 text-sm bg-primary-950 text-white hover:bg-primary-500">
                            Kembali ke Beranda
                        </x-button>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
