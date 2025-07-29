@props(['defaultIcon', 'activeIcon' => null])

@php
    $activeIcon ??= $defaultIcon;
@endphp

<div
    {{ $attributes->merge([
        'x-data' => '{ index: ++count, active: false }',
        'x-effect.current' => 'active = current == index',
        'x-effect.active' => 'active && $el.scrollIntoView({ block: "center" })',
        'x-show' => 'beads >= index',
    ]) }}>
    <x-dynamic-component
        :component="$defaultIcon"
        x-show="!active"
    />
    <x-dynamic-component
        :component="$activeIcon"
        x-bind:class="`text-${theme.current} drop-shadow-md/20`"
        x-show="active"
    />
</div>
