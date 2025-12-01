<x-filament-widgets::widget>
    <x-filament::section>
        <div class="space-y-4">
            {{-- Search Input --}}
            <div class="relative">
                <input
                    type="text"
                    wire:model.live.debounce.300ms="search"
                    placeholder="Search users, devices..."
                    class="block w-full px-6 py-4 text-lg rounded-xl bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-primary-500 transition-colors"
                />
                @if($search)
                    <button
                        wire:click="clearSearch"
                        class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 text-xl"
                    >
                        ✕
                    </button>
                @endif
            </div>

            {{-- Search Results --}}
            @if(strlen($search) >= 2)
                @if(count($this->results) > 0)
                    <div class="rounded-xl overflow-hidden divide-y divide-gray-200 dark:divide-gray-700 bg-gray-50 dark:bg-gray-800/50">
                        @foreach($this->results as $result)
                            <a
                                @if($result['url'])
                                    href="{{ $result['url'] }}"
                                @endif
                                class="block px-5 py-4 hover:bg-gray-100 dark:hover:bg-gray-700/50 transition-colors"
                            >
                                <div class="flex items-center gap-4">
                                    {{-- Avatar/Icon --}}
                                    @if($result['type'] === 'user')
                                        <div class="flex-shrink-0 h-12 w-12 rounded-full bg-primary-100 dark:bg-primary-900/30 flex items-center justify-center">
                                            <span class="text-base font-semibold text-primary-700 dark:text-primary-300">
                                                {{ $result['initials'] }}
                                            </span>
                                        </div>
                                    @else
                                        <div class="flex-shrink-0 h-12 w-12 rounded-full bg-emerald-100 dark:bg-emerald-900/30 flex items-center justify-center">
                                            <span class="text-lg">📱</span>
                                        </div>
                                    @endif

                                    {{-- Content --}}
                                    <div class="flex-1 min-w-0">
                                        <p class="text-base font-medium text-gray-900 dark:text-gray-100 truncate">
                                            {{ $result['title'] }}
                                        </p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 truncate">
                                            {{ $result['subtitle'] }}
                                        </p>
                                    </div>

                                    {{-- Type Badge --}}
                                    <span class="inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-full
                                        @if($result['type'] === 'user')
                                            bg-primary-100 text-primary-700 dark:bg-primary-900/30 dark:text-primary-300
                                        @else
                                            bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-300
                                        @endif
                                    ">
                                        {{ ucfirst($result['type']) }}
                                    </span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    {{-- No Results --}}
                    <div class="rounded-xl bg-gray-50 dark:bg-gray-800/50 px-6 py-10 text-center">
                        <p class="text-4xl mb-3">🔍</p>
                        <h3 class="text-base font-medium text-gray-900 dark:text-gray-100">No results found</h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            No matches for "{{ $search }}"
                        </p>
                    </div>
                @endif
            @elseif($search)
                <p class="text-sm text-gray-500 dark:text-gray-400 text-center py-4">
                    Type at least 2 characters to search...
                </p>
            @endif
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
