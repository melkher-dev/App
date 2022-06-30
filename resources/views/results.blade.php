<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Results') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <table class="table">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">{{ __('Id') }}</th>
                                <th class="px-4 py-2">{{ __('Weapon') }}</th>
                                <th class="px-4 py-2">{{ __('Country') }}</th>
                                <th class="px-4 py-2">{{ __('Amount') }}</th>
                            </tr>
                        </thead>
                        @foreach ($results as $result)
                        <tr>
                            <td class="border px-4 py-2">{{ $result->id }}</td>
                            <td class="border px-4 py-2">{{ $result->country->name }}</td>
                            <td class="border px-4 py-2">{{ $result->weapon->name }}</td>
                            <td class="border px-4 py-2">{{ $result->amount }}</td>
                        </tr>
                        @endforeach
                    </table>

                    {{ $results->links() }}

                </div>
            </div>
        </div>
    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    {{-- таблица с соответсвием --}}
                    <table class="table">
                        <tr>
                            <th class="px-4 py-2"></th>
                            @foreach ($weapons as $weapon)
                            <th class="px-4 py-2">{{ $weapon->name }}</th>
                            @endforeach
                        </tr>

                        @foreach ($countries as $country)
                        <tr>
                            <td class="border px-4 py-2">{{ $country->name }}</td>
                            @foreach ($weapons as $weapon)
                            <td class="border px-4 py-2">
                                @php $huy = 0; @endphp
                                @foreach ($results_huy as $result)
                                @isset($result[$country->name][$weapon->name])
                                @php $huy += (int) $result[$country->name][$weapon->name]; @endphp
                                @endisset
                                @endforeach
                                {{ $huy . '%'; }}
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
