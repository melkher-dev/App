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
                    <button id="cB"><img
                            src="https://github.githubassets.com/images/icons/emoji/unicode/1f1fa-1f1e6.png"></button>
                    <table id="countryTable">
                        <div id="blueColor">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">{{ __('Country') }}</th>
                                    <th class="px-4 py-2">{{ __('Created At') }}</th>
                                </tr>
                            </thead>
                        </div>
                        <div id="yellowColor">
                            @foreach ($countries as $country)
                            <tr>
                                <td class="border px-4 py-2">{{ $country->name }}</td>
                                <td class="border px-4 py-2">{{ $country->created_at }}</td>
                            </tr>
                            @endforeach
                        </div>
                    </table>

                    {{ $countries->links() }}

                </div>
            </div>
        </div>
    </div>

    @section('scripts')
    <script>
        $(document).ready(function () {
            $('#countryTable').DataTable({
                lengthMenu: [
                    [3, 10, 25, 50, -1],
                    [3, 10, 25, 50, 'All'],
                ],
            });

            $( "#cB" ).click(function() {
                document.querySelector("#countryTable > thead").style['backgroundColor'] = 'blue';
                document.querySelector("#countryTable > tbody").style['backgroundColor'] = 'yellow';
            });

        });
    </script>
    @endsection

</x-app-layout>
