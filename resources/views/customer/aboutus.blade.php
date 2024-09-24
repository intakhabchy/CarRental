<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About Us') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Who We Are</h3>
                        <p class="text-gray-700">
                            We are a company committed to providing top-quality car rentals to customers in need of reliable transportation. With a fleet of modern and well-maintained vehicles, we ensure that our clients receive the best experience.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Our Mission</h3>
                        <p class="text-gray-700">
                            Our mission is to make car rental as easy and hassle-free as possible, while offering affordable prices and excellent customer service. We believe in putting our customers first and strive to exceed their expectations every time.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Why Choose Us?</h3>
                        <ul class="list-disc pl-6 text-gray-700">
                            <li>Wide range of vehicles to choose from</li>
                            <li>Competitive pricing</li>
                            <li>24/7 customer support</li>
                            <li>Flexible rental terms</li>
                        </ul>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Contact Us</h3>
                        <p class="text-gray-700">
                            Got questions? Feel free to reach out to us at any time. We are here to help!
                        </p>
                        <p class="text-gray-700">
                            Email: info@ourcompany.com <br>
                            Phone: +880 1234 567890
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
