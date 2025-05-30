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
        content="@lang('Rosary always in hand')"
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
    class="hidden bg-teal-300/80 text-slate-800"
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
    x-effect.current="localStorage.setItem('current', current == beads ? 1 : current)"
    x-on:keydown.arrow-down.prevent="next()"
    x-on:keydown.arrow-left="previous()"
    x-on:keydown.arrow-right="next()"
    x-on:keydown.arrow-up.prevent="previous()"
>
    <div class="absolute flex w-full p-3">
        <div
            class="ml-auto inline-flex cursor-pointer items-center gap-3 text-sm font-medium text-slate-700"
            x-on:click="toggleBeads()"
        >
            @lang('5 decades')
            <div class="w-11 rounded-full p-0.5 outline">
                <div
                    class="size-5 rounded-full bg-slate-700 transition-all"
                    x-bind:class="beads == 225 && 'ml-5'"
                ></div>
            </div>
            @lang('20 decades')
        </div>
    </div>

    <div class="flex justify-center">
        <x-btn-previous></x-btn-previous>

        <div class="mb-3 mt-12 flex flex-col items-center gap-1.5 px-1">
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
