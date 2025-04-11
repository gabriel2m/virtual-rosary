<x-change-btn side="left" x-on:click="
        if(current==1) {
            return;
        }

        current--;
        window.scrollBy(0, -40);
    ">
</x-change-btn>
