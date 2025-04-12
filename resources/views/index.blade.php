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

    <title>{{ config('app.name') }}</title>

    @vite('resources/css/app.css')
</head>

<body
    class="flex justify-center bg-teal-300/70 text-slate-800"
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
</body>

</html>
