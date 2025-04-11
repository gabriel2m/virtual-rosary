<x-change-btn side="right" x-on:click="
        if(current==beads) {
            return;
        }

        current++;
        window.scrollBy(0, 40);
    ">
</x-change-btn>
