<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight underline">
            <a href="{{ route('dashboard') }}">
                Back to dashboard
            </a>
        </h2>
    </x-slot>
    <div class="sm:px-64 mt-4 px-4">
        <x-link-form title='Edit Link' action="{{ route('links.update', $link) }}" method="PUT" :link="$link" :edit="true"/>
    </div>
</x-app-layout>