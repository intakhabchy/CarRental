<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer Detail for Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full bg-white border border-gray-200 mx-auto">
                        <tr>
                            <th class="py-2 px-4 border-b text-center">Rental ID</th>
                            <th class="py-2 px-4 border-b text-center">{{$customerinfo[0]['id']}}</th>
                        </tr>
                        <tr>
                            <th class="py-2 px-4 border-b text-center">User</th>
                            <th class="py-2 px-4 border-b text-center">{{$customerinfo[0]['name']}}</th>
                        </tr>
                        <tr>
                            <th class="py-2 px-4 border-b text-center">Email</th>
                            <th class="py-2 px-4 border-b text-center">{{$customerinfo[0]['email']}}</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
