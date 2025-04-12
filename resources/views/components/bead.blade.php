<i
    {{ $attributes->class(['bead focus-visible:outline-0']) }}
    x-bind:class="{ 'text-white': current == index }"
    x-data="{
        index: null,
        init() {
            this.index = ++beads;
    
            let scroll = current => {
                if (current != this.index) {
                    return;
                }
    
                $el.scrollIntoView({ block: 'center' })
            };
    
            scroll(current);
    
            $watch('current', scroll);
        }
    }"
></i>
