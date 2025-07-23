<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white text-center">{{ $portfolio->title }}</h2>
    </x-slot>
    <div class="bg-gray-800 text-gray-100 p-5 rounded-lg shadow-lg mt-5 relative">
    <p class="my-2 text-base">{{ $portfolio->description }}</p>
    <p class="my-2 text-xs inline-flex items-center">
        Status: 
        <span class="ml-1 px-2 py-0.5 rounded-full text-xs font-medium 
            {{ $portfolio->is_public ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
            {{ $portfolio->is_public ? 'Public' : 'Private' }}
        </span>
    </p>

    @if($portfolio->user_id == auth()->id())
        <div class="absolute top-5 right-5 flex gap-2.5">
            <a href="{{ route('portfolios.edit', $portfolio) }}" 
               class="bg-green-500 text-white border-none px-3 py-1.5 no-underline rounded cursor-pointer">
               Edit
            </a>

            <form method="POST" action="{{ route('portfolios.destroy', $portfolio) }}" 
                  onsubmit="return confirm('Delete this portfolio?')" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="bg-red-500 text-white border-none px-3 py-1.5 rounded cursor-pointer">
                    Delete
                </button>
            </form>
        </div>
    @endif
</div>



</x-app-layout>


