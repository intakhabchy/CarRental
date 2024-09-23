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

                    <!-- Form section -->
                    {{-- <form method="GET" action="" class="mb-6">
                        <div class="w-full">
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                                <div class="w-full">
                                    <label for="brand" class="block text-gray-700">Brand</label>

                                    <select name="brand" id="brand" class="w-full mt-2 p-2 border rounded">
                                        <option value="">Select</option>
                                        @foreach ($brandlist as $bl)
                                            <option value="{{$bl['brand']}}" {{ request('brand') == $bl['brand'] ? 'selected' : '' }}>
                                                {{$bl['brand']}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="w-full">
                                    <label for="car_type" class="block text-gray-700">Car Type</label>
                                    <select name="car_type" id="car_type" class="w-full mt-2 p-2 border rounded">
                                        <option value="">Select</option>
                                        @foreach ($cartypelist as $ctl)
                                            <option value="{{$ctl['car_type']}}" {{ request('car_type') == $ctl['car_type'] ? 'selected' : '' }}>
                                                {{$ctl['car_type']}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="w-full">
                                    <label for="daily_rent_price" class="block text-gray-700">Rent Price</label>
                                    <select name="price_range" id="price_range" class="w-full mt-2 p-2 border rounded">
                                        <option value="">Select</option>
                                        <option value="1000-2000" {{ request('price_range') == '1000-2000' ? 'selected' : '' }}>1000-2000</option>
                                        <option value="2000-3000" {{ request('price_range') == '2000-3000' ? 'selected' : '' }}>2000-3000</option>
                                        <option value="3000-4000" {{ request('price_range') == '3000-4000' ? 'selected' : '' }}>3000-4000</option>
                                        <option value="4000-5000" {{ request('price_range') == '4000-5000' ? 'selected' : '' }}>4000-5000</option>
                                    </select>
                                </div>
                            </div>

                            <div class="flex justify-end mt-4">
                                <button type="submit" style="background-color:green" class="px-4 py-2 text-white rounded-md">
                                    Search
                                </button>
                            </div>
                        </div>
                    </form> --}}

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
                                        <td class="py-2 px-4 border-b text-center">{{ $bl['daily_rent_price'] }}</td>
                                        <td class="py-2 px-4 border-b text-center">{{ $bl['start_date'] }}</td>
                                        <td class="py-2 px-4 border-b text-center">{{ $bl['end_date'] }}</td>
                                        <td class="py-2 px-4 border-b text-center">
                                            @if($bl['cancel_status']==1) Cancelled
                                            @elseif(date('Y-m-d')>$bl['start_date'])
                                            <form action="{{route('customer.bookingcancel',$bl['rent_id'])}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                                                    Delete
                                                </button>
                                            </form>
                                            @else
                                            Started
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
