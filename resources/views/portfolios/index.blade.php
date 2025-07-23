<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('portfolios.create') }}" class="btn font-semibold text-xl px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded dark:text-gray-200 leading-tight">Create Portfolio</a>
    </x-slot>
    
    <div class="py-12 bg-gray-950 min-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Main container card -->
        <div class="bg-gray-900 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-100 space-y-4">
                <ul class="space-y-4">
                    @foreach($portfolios as $portfolio)
                        <li class="flex justify-between items-center border-b border-gray-700 pb-4">
                            <div>
                                <a href="{{ route('portfolios.show', $portfolio) }}" class="text-lg font-semibold hover:underline">
                                    {{ $portfolio->title }}
                                </a>
                                <div class="text-sm mt-1">
                                    @if($portfolio->is_public)
                                        <span class="text-white bg-green-500 px-2 py-0.5 rounded text-xs">Public</span>
                                    @else
                                        <span class="text-white bg-red-500 px-2 py-0.5 rounded text-xs">Private</span>
                                    @endif
                                </div>
                            </div>
                            @if($portfolio->user_id == auth()->id())
                                <div class="flex items-center space-x-3">
                                    <a href="{{ route('portfolios.edit', $portfolio) }}"
                                       class="px-6 py-1 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded">
                                        Edit
                                    </a>
                                    <form action="{{ route('portfolios.destroy', $portfolio) }}" method="POST"
                                          onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-sm rounded">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>






</x-app-layout>