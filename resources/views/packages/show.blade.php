<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-12">

        @if (session()->has('success'))
            <div role="alert" class="mb-12">
                <div class="border border-emerald-400 rounded bg-emerald-100 px-4 py-3 text-emerald-700">
                    <p>{{ session()->get('success') }}</p>
                </div>
            </div>
        @endif

        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <h2 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $package->destination }}</h2>
                    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400 flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 8.25H9m6 3H9m3 6l-3-3h1.5a3 3 0 100-6M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ $package->amount_per_day }}
                    </p>
                    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Expires at, {{ $package->expires_on }}</p>
                </div>
                @if ($package->coupons->isNotEmpty())
                    <div class="mt-8 p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <h2 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Coupons</h2>
                        <ul class="list-disc ml-4">
                            @foreach ($package->coupons as $coupon)
                                <li>{{ $coupon->name }} - INR {{ $coupon->discount_amount }} /-</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="md:col-span-2">
                <form action="{{ route('packages.add-coupon', $package->id) }}" method="POST">
                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                            <div>
                                <h2 class="text-xl">Add Discount Coupons</h2>
                            </div>
                            @if ($errors->any())
                                <ul class="mb-8 text-red-500 text-sm list-disc ml-4">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="grid grid-cols-2 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label
                                        for="name"
                                        class="block text-sm font-medium text-gray-700"
                                    >
                                        Name
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input
                                            type="text"
                                            name="name"
                                            id="name"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            placeholder="Black Friday Offer"
                                            value="{{ old('name') }}"
                                        >
                                    </div>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label
                                        for="discount_amount"
                                        class="block text-sm font-medium text-gray-700"
                                    >
                                        Amount
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input
                                            type="text"
                                            name="discount_amount"
                                            id="discount_amount"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            placeholder="10.00"
                                            value="{{ old('discount_amount') }}"
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                            @csrf
                            <button
                                type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            >
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>