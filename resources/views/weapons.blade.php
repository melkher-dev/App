<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Weapons') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('weapons.store') }}">
                        @csrf

                        <div class="mt-4">
                            <x-label for="weapon" :value="__('Weapon')" />
                            <x-input id="weapon" class="block mt-1 w-full @error ('weapon') is-invalid @enderror"
                                type="weapon" name="weapon" value="{{ old('weapon') }}" />
                            @error('weapon')
                            <div style="color: red" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <x-button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                {{ __('save weapon') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table>
                        <thead>
                            <tr>
                                <th class="px-4 py-2">{{ __('Weapon') }}</th>
                                <th class="px-4 py-2">{{ __('Created At') }}</th>
                            </tr>
                        </thead>
                        @foreach ($weapons as $weapon)
                        <tr>
                            <td class="border px-4 py-2">{{ $weapon->name }}</td>
                            <td class="border px-4 py-2">{{ $weapon->created_at }}</td>
                        </tr>
                        @endforeach
                    </table>

                    {{ $weapons->links() }}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
