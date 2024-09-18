<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Car List for Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-center mb-4">
                        <a href="{{ route('admin.carcreate') }}" class="inline-block text-white px-4 py-2 rounded" style="background-color: green;">Add</a>
                    </div>
                    <table class="min-w-full bg-white border border-gray-200 mx-auto">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b text-center">Sl</th>
                                <th class="py-2 px-4 border-b text-center">Name</th>
                                <th class="py-2 px-4 border-b text-center">Brand</th>
                                <th class="py-2 px-4 border-b text-center">Model</th>
                                <th class="py-2 px-4 border-b text-center">Car Type</th>
                                <th class="py-2 px-4 border-b text-center">Rent Price</th>
                                <th class="py-2 px-4 border-b text-center">Availability</th>
                                <th class="py-2 px-4 border-b text-center">Image</th>
                                <th class="py-2 px-4 border-b text-center">Action</th>
                                <th class="py-2 px-4 border-b text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carlist as $key => $cl)
                                <tr>
                                    <td class="py-2 px-4 border-b text-center">{{ $key + 1 }}</td>
                                    <td class="py-2 px-4 border-b text-center">{{ $cl['name'] }}</td>
                                    <td class="py-2 px-4 border-b text-center">{{ $cl['brand'] }}</td>
                                    <td class="py-2 px-4 border-b text-center">{{ $cl['model'] }}</td>
                                    <td class="py-2 px-4 border-b text-center">{{ $cl['car_type'] }}</td>
                                    <td class="py-2 px-4 border-b text-center">{{ $cl['daily_rent_price'] }}</td>
                                    <td class="py-2 px-4 border-b text-center">{{ $cl['availability'] ? "Available" : "Not Available" }}</td>
                                    <td class="py-2 px-4 border-b text-center">
                                        <img src="{{ asset('storage/' . $cl['image']) }}" alt="Car Image" class="w-16 h-16 object-cover mx-auto">
                                    </td>
                                    <td class="py-2 px-4 border-b text-center">
                                        {{-- <button style="background-color: #facc15;" class="text-white px-4 py-2 rounded">Edit</button> --}}
                                        <a href="{{ route('admin.caredit',$cl['id']) }}" class="inline-block text-white px-4 py-2 rounded" style="background-color: #facc15;">Edit</a>
                                    </td>
                                    <td class="py-2 px-4 border-b text-center">
                                        <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
