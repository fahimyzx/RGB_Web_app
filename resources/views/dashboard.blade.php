<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Logged in notification --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            {{-- RGB Search Form --}}
            <div class="bg-white mt-6 p-6 rounded shadow-sm">
                <h3 class="text-lg font-semibold mb-4 text-center">🔍 Search Object RGB Data</h3>

                {{-- Form with POST method and route updated to match rgb.search --}}
                <form method="POST" action="{{ route('rgb.search') }}">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        {{-- Red input field --}}
                        <div>
                            <label for="red" class="block text-sm font-medium text-gray-700">Red</label>
                            <input type="number" name="red" id="red" min="0" max="255" required
                                   value="{{ old('red') }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300 focus:border-blue-500">
                            @error('red')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Green input field --}}
                        <div>
                            <label for="green" class="block text-sm font-medium text-gray-700">Green</label>
                            <input type="number" name="green" id="green" min="0" max="255" required
                                   value="{{ old('green') }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300 focus:border-blue-500">
                            @error('green')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Blue input field --}}
                        <div>
                            <label for="blue" class="block text-sm font-medium text-gray-700">Blue</label>
                            <input type="number" name="blue" id="blue" min="0" max="255" required
                                   value="{{ old('blue') }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300 focus:border-blue-500">
                            @error('blue')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Submit button --}}
                    <div class="flex justify-center">
                        <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded shadow">
                            Search RGB Object
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
