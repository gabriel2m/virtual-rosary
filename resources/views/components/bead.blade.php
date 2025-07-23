<i
    {{ $attributes->merge([
        'x-bind:class' => 'current == index && `text-white text-shadow-lg/25`',
        'x-data' => '{ index: ++count }',
        'x-effect' => 'current == index && $el.scrollIntoView({ block: "center" })',
        'x-show' => 'beads >= index',
    ]) }}></i>
