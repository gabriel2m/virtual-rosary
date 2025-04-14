@props(['side'])

<div class="w-15 flex h-dvh items-center justify-center">
    <button
        {{ $attributes->class(['cursor-pointer fixed'])->merge(['x-data' => true]) }}
        type="button"
    >
        <i class="las la-chevron-{{ $side }} text-5xl"></i>
    </button>
</div>
