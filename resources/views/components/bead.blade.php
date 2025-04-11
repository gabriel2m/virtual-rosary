<i {{ $attributes->class(['bead focus-visible:outline-0']) }} x-data="{ index: null }" 
    x-init="
        index = ++beads;

        let scroll = current => {
            if(current != index) {
                return;
            }

            $el.scrollIntoView({ block: 'center' })
        };

        scroll(current);

        $watch('current', scroll);
    "
    X-bind:class="{ 'text-white': current == index }"></i>
