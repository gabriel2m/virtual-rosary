@props(['type'])

@php
    $typeSide = [
        'previous' => 'left',
        'next' => 'right',
    ];
@endphp

<div class="w-17 flex h-dvh items-center justify-center">
    <button
        {{ $attributes->class(['fixed'])->merge([
            'type' => 'button',
            'x-on:click' => "$type()",
        ]) }}
    >
        <x-dynamic-component
            :component='"lineawesome-chevron-{$typeSide[$type]}-solid"'
            class="size-12"
        />
    </button>
</div>
