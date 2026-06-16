@extends('layouts.app')

@section('title', $addon->title . ' - NRATrainz')

@section('content')
    <!-- Header Section -->
    <section class="relative overflow-hidden px-6 pt-28 pb-20 text-background sm:px-8 lg:px-12">
        <div class="absolute inset-0 bg-cover bg-center blur-[3px] scale-105"
            style="background-image: url('{{ asset('images/bg-navbar.webp') }}');"></div>
        <div class="absolute inset-0 bg-slate-950/45"></div>

        <div class="relative z-10 mx-auto max-w-7xl">
            <div
                class="max-w-3xl rounded-3xl border border-white/15 bg-white/10 p-8 shadow-[0_20px_60px_rgba(15,23,42,0.28)] backdrop-blur-md sm:p-10">
                <span class="inline-block rounded-full bg-primary-950/90 px-3 py-1 text-xs font-semibold uppercase tracking-[0.22em] text-white">
                    {{ $addon->category?->name ?? 'Tanpa Kategori' }}
                </span>
                <h1 class="mt-4 text-4xl font-bold tracking-tight sm:text-5xl lg:text-6xl">{{ $addon->title }}</h1>
                <p class="mt-4 text-xs text-background/80">
                    Dipublikasikan pada {{ $addon->created_at?->format('d M Y') ?? '-' }}
                </p>

                <div class="mt-6">
                    <x-button href="{{ route('addons.index') }}"
                        class="px-5 py-3 text-sm border border-background/70 bg-background/10 text-background backdrop-blur-sm hover:bg-background hover:text-primary-950">
                        <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Katalog
                    </x-button>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Section -->
    <section class="bg-white py-12 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-6 sm:px-8">
            <div class="grid gap-8 lg:grid-cols-3">
                
                <!-- Left Column: Image Gallery and Description -->
                <div class="lg:col-span-2 space-y-8">
                    
                    <!-- Image Preview Section -->
                    <div class="overflow-hidden rounded-3xl border border-slate-100 bg-slate-50 p-3 shadow-md">
                        <div class="relative overflow-hidden rounded-2xl bg-black">
                            <img id="main-preview-image" src="{{ asset('storage/' . $addon->thumbnail) }}" alt="{{ $addon->title }}"
                                class="w-full object-contain max-h-[480px] mx-auto transition duration-300" />
                        </div>
                        
                        <!-- Thumbnail list if additional images exist -->
                        @if($addon->images->count() > 0)
                            <div class="mt-4 flex flex-wrap gap-2 px-1 pb-1">
                                <!-- Thumbnail of main image -->
                                <button class="thumbnail-btn active relative h-16 w-24 overflow-hidden rounded-xl border-2 border-primary-500 focus:outline-none transition"
                                    data-full-src="{{ asset('storage/' . $addon->thumbnail) }}">
                                    <img src="{{ asset('storage/' . $addon->thumbnail) }}" alt="Thumbnail Main" class="h-full w-full object-cover" />
                                </button>
                                
                                @foreach($addon->images->sortBy('sort_order') as $image)
                                    <button class="thumbnail-btn relative h-16 w-24 overflow-hidden rounded-xl border border-slate-200 focus:outline-none transition hover:border-primary-500"
                                        data-full-src="{{ asset('storage/' . $image->image_path) }}">
                                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->caption ?? 'Preview image' }}" class="h-full w-full object-cover" />
                                    </button>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Description Section -->
                    <div class="rounded-3xl border border-slate-100 bg-white p-6 shadow-md sm:p-8">
                        <h2 class="text-2xl font-bold text-primary-950 border-b border-slate-100 pb-4">Deskripsi Addon</h2>
                        <div class="mt-6 text-base leading-8 text-slate-700">
                            {!! $addon->description ?? 'Tidak ada deskripsi untuk addon ini.' !!}
                        </div>
                    </div>
                    
                </div>

                <!-- Right Column: Addon Information Card & Dependencies -->
                <div class="space-y-8">
                    
                    <!-- Metadata & Download Info Card -->
                    <div class="rounded-3xl border border-slate-150 bg-white p-6 shadow-lg sm:p-8 space-y-6">
                        <h3 class="text-xl font-bold text-primary-950">Informasi File</h3>
                        
                        <dl class="divide-y divide-slate-100 text-sm">
                            <div class="flex justify-between py-3">
                                <dt class="text-slate-500">Tipe Addon</dt>
                                <dd class="font-semibold text-slate-800 uppercase">{{ $addon->addon_type ?? '-' }}</dd>
                            </div>
                            <div class="flex justify-between py-3">
                                <dt class="text-slate-500">Ukuran File</dt>
                                <dd class="font-semibold text-slate-800">{{ $addon->file_size ?? '-' }}</dd>
                            </div>
                            <div class="flex justify-between py-3">
                                <dt class="text-slate-500">Sumber/Kreator</dt>
                                <dd class="font-semibold text-slate-800">{{ $addon->source_name ?? 'NRATrainz' }}</dd>
                            </div>
                            <div class="flex justify-between py-3">
                                <dt class="text-slate-500">Tanggal Unggah</dt>
                                <dd class="font-semibold text-slate-800">{{ $addon->created_at?->format('d F Y') ?? '-' }}</dd>
                            </div>
                        </dl>
                        
                        <div class="pt-4 border-t border-slate-100">
                            <x-button href="{{ $addon->download_url }}" target="_blank" rel="noopener noreferrer"
                                class="w-full py-4 text-sm font-semibold rounded-2xl bg-primary-950 text-white hover:bg-primary-500 shadow-md">
                                <i class="fa-solid fa-download mr-2"></i> Download Addon
                            </x-button>
                        </div>
                    </div>

                    <!-- Dependencies Card -->
                    @if($addon->dependencies->count() > 0)
                        <div class="rounded-3xl border border-slate-150 bg-white p-6 shadow-md sm:p-8 space-y-4">
                            <h3 class="text-lg font-bold text-primary-950 flex items-center gap-2">
                                <i class="fa-solid fa-puzzle-piece text-primary-500"></i> Dependensi / Kebutuhan
                            </h3>
                            <p class="text-xs text-slate-500">Addon ini memerlukan beberapa file dependensi berikut agar dapat berfungsi dengan baik di game simulator.</p>
                            
                            <ul class="divide-y divide-slate-100 text-sm">
                                @foreach($addon->dependencies->sortBy('sort_order') as $dependency)
                                    <li class="py-4 space-y-2">
                                        <div class="flex items-center justify-between">
                                            <span class="font-semibold text-slate-800">{{ $dependency->name }}</span>
                                            @if($dependency->is_required)
                                                <span class="rounded-full bg-red-100 px-2.5 py-0.5 text-2xs font-medium text-red-700">Wajib</span>
                                            @else
                                                <span class="rounded-full bg-slate-100 px-2.5 py-0.5 text-2xs font-medium text-slate-700">Opsional</span>
                                            @endif
                                        </div>
                                        @if($dependency->description)
                                            <p class="text-xs text-slate-500 leading-normal">{{ $dependency->description }}</p>
                                        @endif
                                        @if($dependency->url)
                                            <div class="pt-1 flex items-center justify-between text-xs">
                                                <span class="text-slate-400">Sumber: {{ $dependency->source_name ?? 'Luar' }}</span>
                                                <a href="{{ $dependency->url }}" target="_blank" rel="noopener noreferrer" 
                                                   class="font-medium text-primary-500 hover:text-primary-900 flex items-center gap-1 transition">
                                                    Download Dep <i class="fa-solid fa-up-right-from-square text-3xs"></i>
                                                </a>
                                            </div>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('js/navbar.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mainPreview = document.getElementById('main-preview-image');
            const thumbnailButtons = document.querySelectorAll('.thumbnail-btn');
            
            thumbnailButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const newSrc = this.getAttribute('data-full-src');
                    
                    // Fade effect
                    mainPreview.style.opacity = '0';
                    
                    setTimeout(() => {
                        mainPreview.setAttribute('src', newSrc);
                        mainPreview.style.opacity = '1';
                    }, 150);
                    
                    // Toggle active classes
                    thumbnailButtons.forEach(btn => {
                        btn.classList.remove('border-primary-500');
                        btn.classList.add('border-slate-200');
                    });
                    this.classList.remove('border-slate-200');
                    this.classList.add('border-primary-500');
                });
            });
        });
    </script>
@endsection
