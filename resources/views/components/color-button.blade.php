<button
    {{ $attributes->class(['m-1 size-6 rounded-full'])->merge([
        'type' => 'button',
        'x-bind:class' => '`bg-${color}`',
        'x-data' => '{ color: `${base}-${variant}` }',
        'x-on:click' => sprintf({{-- prettier-ignore-start --}}
            '() => {
                if(Object.values(theme).includes(color)) {
                    error = "%s";
                    return;
                }
                error = "";
                theme[selected] = color;
            }',
            __('This color is already being used.')
            {{-- prettier-ignore-end --}}),
    ]) }}
></button>
