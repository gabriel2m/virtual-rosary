<i
    {{ $attributes }}
    x-bind:class="{ 'text-white': current == index }"
    x-data="{
        index: null,
        init() {
            this.index = ++count;
    
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
    x-show="beads >= index"
></i>
