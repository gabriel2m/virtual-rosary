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

    @vite('resources/css/app.css')
</head>

<body
    class="bg-teal-300/70 text-slate-800"
    x-data="{
        beads: 0,
        current: parseInt(localStorage.getItem('current') ?? 1),
        next() {
            this.current = Math.min(this.beads, this.current + 1);
        },
        previous() {
            this.current = Math.max(1, this.current - 1);
        }
    }"
    x-init="$watch('current', current => localStorage.setItem('current', current == beads ? 1 : current))"
    x-on:keyup.down="next()"
    x-on:keyup.left="previous()"
    x-on:keyup.right="next()"
    x-on:keyup.up="previous()"
>
    <div class="flex justify-center">
        <x-btn-previous></x-btn-previous>

        <div class="flex flex-col items-center gap-1.5 p-5">

            <x-apostles-creed></x-apostles-creed>

            <x-our-father></x-our-father>

            <x-hail-mary></x-hail-mary>
            <x-hail-mary></x-hail-mary>
            <x-hail-mary></x-hail-mary>

            @foreach (range(1, 5) as $i)
                <x-our-father></x-our-father>
                @foreach (range(1, 10) as $n)
                    <x-hail-mary></x-hail-mary>
                @endforeach
            @endforeach
        </div>

        <x-btn-next></x-btn-next>

        @vite('resources/js/app.js')
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
</body>

</html>
