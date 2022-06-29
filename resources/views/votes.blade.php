<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Votes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('results.store') }}">
                        @csrf

                        <div class="container">
                            <div class="col-2">
                                <x-label for="country_id">Country</x-label>
                                <x-select class="form-control mb-2" name="country_id">
                                    @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">
                                        {{ $country->name }}
                                    </option>
                                    @endforeach
                                </x-select>
                            </div>
                            <div class="col-2">
                                <x-label for="weapon_id">Weapon</x-label>
                                <x-select class="form-control mb-2" name="weapon_id">
                                    @foreach ($weapons as $weapon)
                                    <option value="{{ $weapon->id }}">
                                        {{ $weapon->name }}
                                    </option>
                                    @endforeach
                                </x-select>
                            </div>
                            <div class="col-2 mt-2">
                                <x-label for="amount" :value="__('Amount')" />
                                <x-input class="form-control mb-2 @error ('amount') is-invalid @enderror" type="number"
                                    name="amount" value="{{ old('amount') }}" />
                                @error('amount')
                                <div style="color: red" class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-1 mt-2">
                                <x-button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    {{ __('save vote') }}
                                </x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
