<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('notes.store') }}">
            @csrf
            <textarea name="message" placeholder="{{ __('Add a note!') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('message') }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Add') }}</x-primary-button>
        </form>

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($notes as $note)
                <div class="p-6 border-b border-gray-300 bg-gray-50 rounded-lg shadow-sm">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-gray-800 font-semibold">{{ $note->user->name }}</span>
                            <small class="ml-2 text-sm text-gray-600">
                                {{ $note->created_at->format('j M Y, g:i a') }}
                            </small>
                            @if (!$note->created_at->eq($note->updated_at))
                                <small class="text-sm text-gray-600"> &middot; edited</small>
                            @endif
                        </div>
                        @if ($note->user->is(auth()->user()))
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('notes.edit', $note)">
                                        {{ __('Edit') }}
                                    </x-dropdown-link>
                                    <form method="POST" action="{{ route('notes.destroy', $note) }}">
                                        @csrf
                                        @method('delete')
                                        <x-dropdown-link :href="route('notes.destroy', $note)" onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Delete') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        @endif
                    </div>
                    <p class="mt-4 text-lg text-gray-900">{{ $note->message }}</p>

                    @if ($note->remarks->count() > 0)
                        <div class="mt-4 border-t border-gray-300 pt-4">
                            <h3 class="text-sm font-semibold text-gray-700">Remarks:</h3>
                            @foreach ($note->remarks as $remark)
                                <div class="mt-2 bg-white border border-gray-300 shadow-sm rounded-lg p-4">
                                    <p class="text-sm text-gray-900">{{ $remark->message }}</p>
                                    <small class="text-xs text-gray-600 block mt-2">
                                        - {{ $remark->user->name }}, {{ $remark->created_at->format('j M Y, g:i a') }}
                                    </small>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="{{ route('remarks.store', $note) }}" class="mt-4">
                        @csrf
                        <textarea name="message" class="w-full text-xs border-gray-300 rounded-md p-2"
                            placeholder="Add a remark..."></textarea>
                        <x-primary-button type="submit" class="mt-2 text-xs bg-blue-500 text-white px-3 py-1 rounded">Comment</x-primary-button>
                    </form>
                </div>
                <hr class="my-4 border-gray-400">
            @endforeach
        </div>
    </div>
</x-app-layout>
s