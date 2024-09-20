<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Rental') }}
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
                    <form action="{{ route('admin.rentalupdate',$rentalinfo[0]['id']) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="user" class="block text-gray-700">User:</label>
                            <select name="user_id" id="user_id" class="w-full mt-2 p-2 border rounded" required>
                                <option value="">Select</option>
                                @foreach ($users as $user)
                                    <option value="{{$user['id']}}" @if ($rentalinfo[0]['user_id']==$user['id']) selected @endif>{{$user['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <label for="car" class="block text-gray-700">Car:</label>
                            <select name="car_id" id="car_id" class="w-full mt-2 p-2 border rounded" required>
                                <option value="">Select</option>
                                @foreach ($cars as $car)
                                    <option value="{{$car['id']}}" @if ($rentalinfo[0]['car_id']==$car['id']) selected @endif>{{$car['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        <div class="mb-4">
                            <label for="start_date" class="block text-gray-700">Start Date:</label>
                            <input type="date" name="start_date" id="start_date" class="w-full mt-2 p-2 border rounded" required value={{$rentalinfo[0]['start_date']}}>
                        </div>
                    
                        <div class="mb-4">
                            <label for="end_date" class="block text-gray-700">End Date:</label>
                            <input type="date" name="end_date" id="end_date" class="w-full mt-2 p-2 border rounded" required value={{$rentalinfo[0]['end_date']}}>
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