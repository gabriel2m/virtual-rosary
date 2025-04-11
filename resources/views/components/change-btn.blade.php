@props(['side'])

<div class="h-screen items-center flex w-15 justify-center">
    <button {{ $attributes->class(['cursor-pointer fixed'])->merge(['x-data' => true]) }}>
        <i class="las la-chevron-{{ $side }} text-5xl"></i>
    </button>
</div>
