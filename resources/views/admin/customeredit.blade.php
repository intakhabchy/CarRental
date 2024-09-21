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
                    <form action="{{ route('admin.customerupdate',$customerinfo[0]['id']) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="start_date" class="block text-gray-700">Name:</label>
                            <input type="text" name="name" id="name" class="w-full mt-2 p-2 border rounded" required value={{$customerinfo[0]['name']}}>
                        </div>
                    
                        <div class="mb-4">
                            <label for="end_date" class="block text-gray-700">Email:</label>
                            <input type="text" name="email" id="email" class="w-full mt-2 p-2 border rounded" required value={{$customerinfo[0]['email']}}>
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