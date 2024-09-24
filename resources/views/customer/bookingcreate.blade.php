<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book New Car') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        @if (session('success'))
                            {{session('success')}}                            
                        @endif
                    </div>                    
                    <form action="{{ route('customer.bookingstore') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="car" class="block text-gray-700">Car:</label>
                            <select name="car" id="car" class="w-full mt-2 p-2 border rounded" required>
                                <option value="">Select</option>
                                @foreach ($carlist as $cl)
                                    <option value="{{$cl['id']}}">{{$cl['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Start Date:</label>
                            <input type="date" name="start_date" id="start_date" class="w-full mt-2 p-2 border rounded" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="brand" class="block text-gray-700">End Date:</label>
                            <input type="date" name="end_date" id="end_date" class="w-full mt-2 p-2 border rounded" required>
                        </div>

                        <div class="text-right">
                            <button style="background-color: green" class="text-white px-4 py-2 rounded">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>