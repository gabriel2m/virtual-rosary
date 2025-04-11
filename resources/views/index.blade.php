<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    @vite('resources/css/app.css')
</head>

<body 
    class="flex justify-center bg-sky-300/80 text-slate-800" 
    x-data="{ 
        beads: 0, 
        current: localStorage.getItem('current') ?? 1
    }"
    x-init="$watch('current', current => localStorage.setItem('current', current == beads ? 1 : current))"
>
    <x-btn-previous></x-btn-previous>

    <div class="flex items-center flex-col gap-1.5 p-5">

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
