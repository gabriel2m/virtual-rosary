<!DOCTYPE html>
<html
    class="scroll-smooth"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    x-data="{
        set: (key, value) => localStorage.setItem(key, JSON.stringify(value)),
        get: (key, defaultValue = null) => JSON.parse(localStorage.getItem(key)) ?? defaultValue
    }"
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
    x-bind:class="`bg-${theme.background} text-${theme.content}`"
    x-cloak
    x-data="{
        beads: get('beads', 60),
        theme: get('theme', {
            background: 'teal-300',
            content: 'slate-800',
            current: 'white'
        }),
        current: get('current', 1),
        count: 0,
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
    x-effect.beads="set('beads', beads)"
    x-effect.current="set('current', current == beads ? 1 : current)"
    x-effect.theme="set('theme', theme)"
    x-on:keydown.arrow-down.prevent="next()"
    x-on:keydown.arrow-left="previous()"
    x-on:keydown.arrow-right="next()"
    x-on:keydown.arrow-up.prevent="previous()"
>
    <div class="items-between absolute flex w-full flex-col p-3 text-sm font-medium">
        <div class="flex gap-4">
            <button
                class="flex items-center gap-3"
                type="button"
                x-on:click="toggleBeads()"
            >
                @lang('5 decades')
                <div class="w-11 rounded-full p-0.5 outline">
                    <div
                        class="size-5 rounded-full bg-current transition-all"
                        x-bind:class="beads == 225 && 'ml-5'"
                    >
                    </div>
                </div>
                @lang('20 decades')
            </button>
            <div class="w-px bg-current"></div>
            <div
                class="my-auto"
                x-data="{ open: false }"
            >
                <button
                    class="flex"
                    type="button"
                    x-on:click="open = !open"
                >
                    @lang('Theme')
                    <x-lineawesome-paint-roller-solid class="-mt-0.5 ml-0.5 size-5" />
                </button>
                <div
                    class="absolute right-0 z-20 flex w-screen md:right-auto md:w-auto"
                    x-show="open"
                    x-transition
                >
                    <div
                        class="bg-linear-to-br m-auto mt-1 flex size-min flex-col gap-3 rounded-md from-blue-950 to-white p-3 text-sm text-white shadow-lg"
                        x-data="{
                            selected: 'background',
                            error: null
                        }"
                        x-on:click.away="open = false"
                    >
                        <ul class="flex w-full justify-between px-5">
                            @foreach (['background', 'content', 'current'] as $item)
                                <li>
                                    <button
                                        class="w-full px-3 py-0.5 hover:border-b"
                                        type="button"
                                        x-bind:class="selected == '{{ $item }}' && 'border-b'"
                                        x-on:click="selected = '{{ $item }}'"
                                    >
                                        @lang(ucfirst($item))
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                        <p
                            x-show="error"
                            x-text="error"
                        ></p>
                        <div class="flex">
                            <template
                                x-for="base in ['red', 'amber', 'green', 'teal', 'sky', 'indigo', 'purple', 'pink', 'slate']"
                            >
                                <div>
                                    <x-color-button x-data="{ color: 'white' }"></x-color-button>
                                    <template x-for="variant in [200, 300, 400, 500, 600, 700, 800, 900]">
                                        <x-color-button></x-color-button>
                                    </template>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button
            class="fixed right-3 mt-0.5 flex items-center gap-1"
            type="button"
            x-on:click="current = 1"
            x-show="current != 1"
        >
            @lang('Restart')
            <x-lineawesome-undo-alt-solid class="size-5" />
        </button>
    </div>

    <div class="flex justify-center">
        <x-change-current-button type="previous" />

        <x-beads-container class="mb-3 mt-12">
            <x-apostles-creed />

            <x-our-father />

            <template x-for="n in Array(3)">
                <x-hail-mary />
            </template>

            <template x-for="i in Array(20)">
                <x-beads-container>
                    <x-our-father />
                    <template x-for="n in Array(10)">
                        <x-hail-mary />
                    </template>
                </x-beads-container>
            </template>
        </x-beads-container>

        <x-change-current-button type="next" />
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
