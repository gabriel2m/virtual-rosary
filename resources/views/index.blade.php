<!DOCTYPE html>
<html
    class="scroll-smooth"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
>

<head>
    <meta charset="utf-8">
    <meta
        content="width=device-width, initial-scale=1"
        name="viewport"
    >

    <link
        href="{{ Vite::asset('resources/images/logo.svg') }}"
        rel="icon"
        type="image/svg+xml"
    />

    <title>{{ config('app.name') }}</title>

    <meta
        content="{{ config('app.name') }}"
        property="og:title"
    />
    <meta
        content="{{ __('Rosary always in hand') }}"
        property="og:description"
    />
    <meta
        content="{{ Vite::asset('resources/images/og-image.png') }}"
        property="og:image"
    />
    <meta
        content="{{ config('app.url') }}"
        property="og:url"
    />
    <meta
        content="website"
        property="og:type"
    />

    @vite('resources/css/app.css')
</head>

<body
    {{-- Display screen only after Alpine initialized --}}
    class="hidden bg-teal-300/70 text-slate-800"
    x-bind:class="{ 'hidden': false }"
    x-data="{
        beads: parseInt(localStorage.getItem('beads') ?? 60),
        count: 0,
        current: parseInt(localStorage.getItem('current') ?? 1),
        toggleBeads() {
            this.beads = this.beads == 60 ? 225 : 60;
            if (this.current > this.beads) {
                this.current = 1;
            }
        },
        next() {
            this.current = Math.min(this.beads, this.current + 1);
        },
        previous() {
            this.current = Math.max(1, this.current - 1);
        }
    }"
    x-effect.beads="localStorage.setItem('beads', beads)"
    x-init="$watch('current', current => localStorage.setItem('current', current == beads ? 1 : current))"
    x-on:keyup.down="next()"
    x-on:keyup.left="previous()"
    x-on:keyup.right="next()"
    x-on:keyup.up="previous()"
>
    <div class="absolute flex w-full p-3">
        <div
            class="ml-auto inline-flex cursor-pointer items-center gap-3 text-sm font-medium text-slate-700"
            x-on:click="toggleBeads()"
        >
            @lang('5 decades')
            <div
                class="relative h-6 w-11 rounded-full border after:absolute after:bottom-0 after:left-[0.0625rem] after:top-0 after:my-auto after:h-5 after:w-5 after:rounded-full after:bg-slate-800 after:transition-all after:content-['']"
                x-bind:class="beads == 225 && 'after:translate-x-5'"
            >
            </div>
            @lang('20 decades')
        </div>
    </div>

    <div class="flex justify-center">
        <x-btn-previous></x-btn-previous>

        <div class="flex flex-col items-center gap-1.5 p-5">

            <x-apostles-creed></x-apostles-creed>

            <x-our-father></x-our-father>

            <x-hail-mary></x-hail-mary>
            <x-hail-mary></x-hail-mary>
            <x-hail-mary></x-hail-mary>

            @foreach (range(1, 20) as $i)
                <x-our-father></x-our-father>
                @foreach (range(1, 10) as $n)
                    <x-hail-mary></x-hail-mary>
                @endforeach
            @endforeach
        </div>

        <x-btn-next></x-btn-next>
    </div>

    <div class="flex justify-end px-5 py-2">
        <a
            class="underline"
            href="https://www.linkedin.com/in/gabriel2m"
            rel="noopener noreferrer"
            target="_blank"
        >
            @gabriel2m
        </a>
    </div>

    @vite('resources/js/app.js')
</body>

</html>
