<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                {{-- Content --}}
                <div class="sm:flex flex-row">
                    <section class="sm:w-[50%] px-4 sm:p-0">
                        <x-link-form title='Create a new link' action="{{ route('links.store') }}" method="POST"/>
                        
                        <a href="{{ route('user.index', auth()->user()->username) }}" class="text-gray-600 dark:text-gray-400 text-center underline mt-3 inline-block">
                            Preview
                        </a>
                    </section>

                    <section class="sm:w-[50%] px-4 sm:px-20 mt-6 sm:m-0 ">
                        <x-link-list :links="$links"/>
                    </section>
                </div>
        </div>
    </div>
</x-app-layout>
