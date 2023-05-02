<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg p-4">
    
    <h2 class="text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ $title }}
    </h2>

    <form action="{{ $action }}" class="mt-4" method="POST">
        @csrf
        @method($method)

        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $link ? $link->title : '')" required autofocus autocomplete="title" />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>

        <div class="mt-4">
            <x-input-label for="url" :value="__('Url')" />
            <x-text-input id="url" name="url" type="text" class="mt-1 block w-full" :value="old('url', $link ? $link->url : '')" required autofocus autocomplete="url" />
            <x-input-error class="mt-2" :messages="$errors->get('url')" />
        </div>

        <x-primary-button class="mt-4">
            Save
        </x-primary-button>
    </form>

    @if ($edit)     
        <button type="submit" class="text-gray-600 dark:text-slate-500 mt-4 float-right" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-link-deletion')">
            delete
        </button>
    @endif
</div>
@if ($edit)
    <x-modal name="confirm-link-deletion" focusable>
        <form action="{{ route('links.destroy', $link) }}" method="POST" class="p-6">
            @csrf
            @method('DELETE')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete this link?') }}
            </h2>

            <p class="mt-1 text-lg text-gray-600 dark:text-gray-400">
                <span class="font-bold">
                    {{$link->title}}:
                </span>
                {{$link->url}}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Delete Link') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal> 
@endif