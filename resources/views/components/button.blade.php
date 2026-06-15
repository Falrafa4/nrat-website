@props(['href' => null])

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => 'inline-flex items-center justify-center cursor-pointer px-4 py-2 rounded transition focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2']) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => 'inline-flex items-center justify-center cursor-pointer px-4 py-2 rounded transition focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2']) }}>
        {{ $slot }}
    </button>
@endif