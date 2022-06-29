<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Countries') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('countries.store') }}">
                        @csrf

                        <div class="mt-4">
                            <x-label for="country" :value="__('Country')" />

                            <x-input id="country" class="block mt-1 w-full @error ('country') is-invalid @enderror"
                                type="country" name="country" value="{{ old('country') }}" />
                            @error('country')
                            <div style="color: red" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <x-button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                {{ __('save country') }}
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
                                <th class="px-4 py-2">{{ __('Country') }}</th>
                                <th class="px-4 py-2">{{ __('Created At') }}</th>
                            </tr>
                        </thead>
                        @foreach ($countries as $country)
                        <tr>
                            <td class="border px-4 py-2">{{ $country->name }}</td>
                            <td class="border px-4 py-2">{{ $country->created_at }}</td>
                        </tr>
                        @endforeach
                    </table>

                    {{ $countries->links() }}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
