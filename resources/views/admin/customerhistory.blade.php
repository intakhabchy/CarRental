<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer History for '.$customerinfo[0]['name']) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full bg-white border border-gray-200 mx-auto">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b text-center">Sl</th>
                                <th class="py-2 px-4 border-b text-center">User</th>
                                <th class="py-2 px-4 border-b text-center">Car</th>
                                <th class="py-2 px-4 border-b text-center">Brand</th>
                                <th class="py-2 px-4 border-b text-center">Start Date</th>
                                <th class="py-2 px-4 border-b text-center">End Date</th>
                                <th class="py-2 px-4 border-b text-center">Total Cost</th>
                                <th class="py-2 px-4 border-b text-center">Cancel Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customerhistory as $key => $ch)
                                <tr>
                                    <td class="py-2 px-4 border-b text-center">{{ $key + 1 }}</td>
                                    <td class="py-2 px-4 border-b text-center">{{ $ch->user_name }}</td>
                                    <td class="py-2 px-4 border-b text-center">{{ $ch->car_name }}</td>
                                    <td class="py-2 px-4 border-b text-center">{{ $ch->car_brand }}</td>
                                    <td class="py-2 px-4 border-b text-center">{{ $ch->start_date }}</td>
                                    <td class="py-2 px-4 border-b text-center">{{ $ch->end_date }}</td>
                                    <td class="py-2 px-4 border-b text-center">{{ $ch->total_cost }}</td>
                                    <td class="py-2 px-4 border-b text-center">@if($ch->cancel_status == 1) Cancelled @endif</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
