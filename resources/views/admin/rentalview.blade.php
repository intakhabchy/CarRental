<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rental Detail for Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full bg-white border border-gray-200 mx-auto">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b text-center">Rental ID</th>
                                <th class="py-2 px-4 border-b text-center">{{$rentalinfo[0]['id']}}</th>
                            </tr>
                            <tr>
                                <th class="py-2 px-4 border-b text-center">User</th>
                                <th class="py-2 px-4 border-b text-center">{{$rentalinfo[0]['user_name']}}</th>
                            </tr>
                            <tr>
                                <th class="py-2 px-4 border-b text-center">Car Name</th>
                                <th class="py-2 px-4 border-b text-center">{{$rentalinfo[0]['car_name']}}</th>
                            </tr>
                            <tr>
                                <th class="py-2 px-4 border-b text-center">Car Brand</th>
                                <th class="py-2 px-4 border-b text-center">{{$rentalinfo[0]['car_brand']}}</th>
                            </tr>
                            <tr>
                                <th class="py-2 px-4 border-b text-center">Start Date</th>
                                <th class="py-2 px-4 border-b text-center">{{$rentalinfo[0]['start_date']}}</th>
                            </tr>
                            <tr>
                                <th class="py-2 px-4 border-b text-center">End Date</th>
                                <th class="py-2 px-4 border-b text-center">{{$rentalinfo[0]['end_date']}}</th>
                            </tr>
                            <tr>
                                <th class="py-2 px-4 border-b text-center">Total Cost</th>
                                <th class="py-2 px-4 border-b text-center">{{$rentalinfo[0]['total_cost']}}</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
