<nav id="main-nav" class="fixed inset-x-0 top-5 z-50 flex justify-center px-4 text-background font-title transition-colors duration-300">
    <ul id="nav-content"
        class="flex flex-wrap justify-center items-center gap-x-6 gap-y-3 w-fit rounded-2xl border border-white/10 bg-background/10 px-6 py-4 shadow-[0_14px_30px_rgba(15,23,42,0.15)] backdrop-blur-md transition-all duration-300 sm:px-10">
        <li><a class="nav-link {{ request()->routeIs('landing') ? 'active' : '' }}" href="{{ route('landing') }}">Home</a></li>
        <li><a class="nav-link {{ request()->routeIs('addons.*') ? 'active' : '' }}" href="{{ route('addons.index') }}">Addons</a></li>
        <li><a class="nav-link {{ request()->routeIs('terms') ? 'active' : '' }}" href="{{ route('terms') }}">Ketentuan</a></li>
        <li><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Kontak</a></li>
        <li><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a></li>
    </ul>
</nav>
