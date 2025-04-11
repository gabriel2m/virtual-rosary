<i {{ $attributes->class(['bead focus-visible:outline-0']) }} x-data="{ index: null }" x-init="index = ++beads"
    X-bind:class="{ 'text-white': current == index }"></i>
