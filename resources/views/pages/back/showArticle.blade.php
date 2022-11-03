<x-app-layout>
    <x-slot name="header" class="flex">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('articlesCRUD')" :activeDash="request()->routeIs('articlesCRUD')">
                {{ __('Articles') }}
            </x-nav-link>
        </div>
    </x-slot>

    @include('partials.back.showArticle')
</x-app-layout>