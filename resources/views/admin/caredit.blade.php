<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Car') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                                        
                    <form action="{{ route('admin.carupdate',$carinfo[0]['id']) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Car Name:</label>
                            <input type="text" name="name" id="name" class="w-full mt-2 p-2 border rounded" required value="{{$carinfo[0]['name']}}">
                        </div>
                        
                        <div class="mb-4">
                            <label for="brand" class="block text-gray-700">Brand:</label>
                            <input type="text" name="brand" id="brand" class="w-full mt-2 p-2 border rounded" required value="{{$carinfo[0]['brand']}}">
                        </div>

                        <div class="mb-4">
                            <label for="model" class="block text-gray-700">Model:</label>
                            <input type="text" name="model" id="model" class="w-full mt-2 p-2 border rounded" required value="{{$carinfo[0]['model']}}">
                        </div>

                        <div class="mb-4">
                            <label for="model" class="block text-gray-700">Year:</label>
                            <input type="text" name="year" id="year" class="w-full mt-2 p-2 border rounded" required value="{{$carinfo[0]['year']}}">
                        </div>

                        <div class="mb-4">
                            <label for="car_type" class="block text-gray-700">Car Type:</label>
                            <input type="text" name="car_type" id="car_type" class="w-full mt-2 p-2 border rounded" required value="{{$carinfo[0]['car_type']}}">
                        </div>

                        <div class="mb-4">
                            <label for="daily_rent_price" class="block text-gray-700">Rent Price:</label>
                            <input type="number" name="daily_rent_price" id="daily_rent_price" class="w-full mt-2 p-2 border rounded" required value="{{$carinfo[0]['daily_rent_price']}}">
                        </div>

                        <div class="mb-4">
                            <label for="availability" class="block text-gray-700">Availability:</label>
                            <select name="availability" id="availability" class="w-full mt-2 p-2 border rounded" required value="{{$carinfo[0]['availability']}}">
                                <option value="1" {{ $carinfo[0]['availability'] == 1 ? 'selected' : '' }}>Available</option>
                                <option value="0" {{ $carinfo[0]['availability'] == 0 ? 'selected' : '' }}>Not Available</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-gray-700">Car Image:</label>
                            <input type="file" name="image" id="image" class="w-full mt-2 p-2 border rounded" required>
                        </div>

                        <div class="text-right">
                            <button style="background-color: green" class="text-white px-4 py-2 rounded">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>