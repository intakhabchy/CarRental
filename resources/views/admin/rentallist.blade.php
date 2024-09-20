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
                        <a href="{{ route('admin.rentalcreate') }}" class="inline-block text-white px-4 py-2 rounded" style="background-color: green;">Add</a>
                    </div>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        @if (session('success'))
                            {{session('success')}}                            
                        @endif
                    </div>
                    <table class="min-w-full bg-white border border-gray-200 mx-auto">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b text-center">Rental ID</th>
                                <th class="py-2 px-4 border-b text-center">Customer Name</th>
                                <th class="py-2 px-4 border-b text-center">Car Name</th>
                                <th class="py-2 px-4 border-b text-center">Car Brand</th>
                                <th class="py-2 px-4 border-b text-center">Rent Start</th>
                                <th class="py-2 px-4 border-b text-center">Rent End</th>
                                <th class="py-2 px-4 border-b text-center">Total Cost</th>
                                <th class="py-2 px-4 border-b text-center">Status</th>
                                <th class="py-2 px-4 border-b text-center">Action</th>
                                <th class="py-2 px-4 border-b text-center">Action</th>
                                <th class="py-2 px-4 border-b text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rentallist as $key => $rl)
                                <tr>
                                    <td class="py-2 px-4 border-b text-center">{{ $key + 1 }}</td>
                                    <td class="py-2 px-4 border-b text-center">{{ $rl['user_name'] }}</td>
                                    <td class="py-2 px-4 border-b text-center">{{ $rl['car_name'] }}</td>
                                    <td class="py-2 px-4 border-b text-center">{{ $rl['car_brand'] }}</td>
                                    <td class="py-2 px-4 border-b text-center">{{ $rl['start_date'] }}</td>
                                    <td class="py-2 px-4 border-b text-center">{{ $rl['end_date'] }}</td>
                                    <td class="py-2 px-4 border-b text-center">{{ $rl['total_cost'] }}</td>
                                    <td class="py-2 px-4 border-b text-center">{{ $rl['end_date']<date('Y-m-d') ? "Completed" : ( ($rl['end_date']>date('Y-m-d') && $rl['start_date']<date('Y-m-d'))?"Ongoing":"Cancelled" ) }}</td>
                                    <td class="py-2 px-4 border-b text-center">
                                        <a href="{{ route('admin.rentalview',$rl['id']) }}" class="inline-block text-white px-4 py-2 rounded" style="background-color: green;">View</a>
                                    </td>
                                    <td class="py-2 px-4 border-b text-center">
                                        <a href="{{ route('admin.rentaledit',$rl['id']) }}" class="inline-block text-white px-4 py-2 rounded" style="background-color: #facc15;">Edit</a>
                                    </td>
                                    <td class="py-2 px-4 border-b text-center">
                                        <form action="{{route('admin.rentaldelete',$rl['id'])}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Cancel</button>
                                        </form>
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
