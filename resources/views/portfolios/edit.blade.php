<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Edit Portfolio</h2>
    </x-slot>

    <div class="flex justify-center items-center min-h-[60vh] pt-12">
        <div class="w-full max-w-md bg-gray-600 dark:bg-gray-600 rounded-lg shadow-md p-8">
            
            <form method="POST" action="{{ route('portfolios.update', $portfolio) }}">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="title" class="block font-medium mb-1 text-white">Title</label>
                    <input id="title" type="text" name="title" value="{{ $portfolio->title }}" required class="w-full px-3 py-2 rounded border border-gray-300 focus:outline-none focus:ring focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="description" class="block font-medium mb-1 text-white">Description</label>
                    <textarea id="description" name="description" class="w-full px-3 py-2 rounded border border-gray-300 focus:outline-none focus:ring focus:border-blue-500">{{ $portfolio->description }}</textarea>
                </div>
                <div class="mb-4">
                    <label class="inline-flex items-center text-white">
                        <input type="checkbox" name="is_public" value="1" {{ $portfolio->is_public ? 'checked' : '' }} class="mr-2">
                        Public
                    </label>
                </div>
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition">Update</button>
            </form>
            
            <form method="POST" action="{{ route('portfolios.destroy', $portfolio) }}" class="mt-4">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Delete this portfolio?')" class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded transition">Delete</button>
            </form>
        </div>
    </div>
</x-app-layout>