<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Car List for User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="text-center mb-4">
                        <a href="{{ route('customer.bookingcreate') }}" class="inline-block text-white px-4 py-2 rounded" style="background-color: green;">Add</a>
                    </div>

                    <!-- Table section -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200 mx-auto w-full">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b text-center">Sl</th>
                                    <th class="py-2 px-4 border-b text-center">Name</th>
                                    <th class="py-2 px-4 border-b text-center">Brand</th>
                                    <th class="py-2 px-4 border-b text-center">Model</th>
                                    <th class="py-2 px-4 border-b text-center">Car Type</th>
                                    <th class="py-2 px-4 border-b text-center">Rent Price</th>
                                    <th class="py-2 px-4 border-b text-center">Start Date</th>
                                    <th class="py-2 px-4 border-b text-center">End Date</th>
                                    <th class="py-2 px-4 border-b text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookinglist as $key => $bl)
                                    <tr>
                                        <td class="py-2 px-4 border-b text-center">{{ $key + 1 }}</td>
                                        <td class="py-2 px-4 border-b text-center">{{ $bl['car_name'] }}</td>
                                        <td class="py-2 px-4 border-b text-center">{{ $bl['car_brand'] }}</td>
                                        <td class="py-2 px-4 border-b text-center">{{ $bl['car_model'] }}</td>
                                        <td class="py-2 px-4 border-b text-center">{{ $bl['car_type'] }}</td>
                                        <td class="py-2 px-4 border-b text-center">{{ $bl['total_cost'] }}</td>
                                        <td class="py-2 px-4 border-b text-center">{{ $bl['start_date'] }}</td>
                                        <td class="py-2 px-4 border-b text-center">{{ $bl['end_date'] }}</td>
                                        <td class="py-2 px-4 border-b text-center">
                                            @if ($bl['cancel_status']==1) Cancelled
                                            @elseif (strtotime(date('Y-m-d')) < strtotime($bl['start_date']))
                                                <form action="{{route('customer.bookingcancel',$bl['rent_id'])}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                                                        Delete
                                                    </button>
                                                </form>
                                            @elseif (strtotime(date('Y-m-d')) >= strtotime($bl['start_date']) && strtotime(date('Y-m-d')) <= strtotime($bl['end_date']))
                                                Started
                                            @elseif (strtotime(date('Y-m-d')) > strtotime($bl['end_date']))
                                                Finished
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
