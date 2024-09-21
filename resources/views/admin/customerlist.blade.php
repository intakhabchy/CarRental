<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer List for Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        @if (session('success'))
                            {{session('success')}}                            
                        @endif
                    </div>
                    <table class="min-w-full bg-white border border-gray-200 mx-auto">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b text-center">Sl</th>
                                <th class="py-2 px-4 border-b text-center">Name</th>
                                <th class="py-2 px-4 border-b text-center">Email</th>
                                <th class="py-2 px-4 border-b text-center">Phone</th>
                                <th class="py-2 px-4 border-b text-center">Address</th>
                                <th class="py-2 px-4 border-b text-center">Action</th>
                                <th class="py-2 px-4 border-b text-center">Action</th>
                                <th class="py-2 px-4 border-b text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customerlist as $key => $cl)
                                <tr>
                                    <td class="py-2 px-4 border-b text-center">{{ $key + 1 }}</td>
                                    <td class="py-2 px-4 border-b text-center">{{ $cl['name'] }}</td>
                                    <td class="py-2 px-4 border-b text-center">{{ $cl['email'] }}</td>
                                    <td class="py-2 px-4 border-b text-center">{{ $cl['phone'] }}</td>
                                    <td class="py-2 px-4 border-b text-center">{{ $cl['address'] }}</td>
                                    <td class="py-2 px-4 border-b text-center">
                                        <a href="{{ route('admin.customerview',$cl['id']) }}" class="inline-block text-white px-4 py-2 rounded" style="background-color: green;">View</a>
                                    </td>
                                    <td class="py-2 px-4 border-b text-center">
                                        <a href="{{ route('admin.customeredit',$cl['id']) }}" class="inline-block text-white px-4 py-2 rounded" style="background-color: #facc15;">Edit</a>
                                    </td>
                                    <td class="py-2 px-4 border-b text-center">
                                        <form action="{{route('admin.customerdelete',$cl['id'])}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button @if ($cl['delete_stat']==1) disabled @endif class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">@if ($cl['delete_stat']==1) Deleted @else Delete @endif</button>
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
