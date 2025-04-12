<i
    @click="current = index"
    {{ $attributes->class(['cursor-pointer']) }}
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
