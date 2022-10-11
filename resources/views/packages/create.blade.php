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
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Holiday Packages</h3>
                    <p class="mt-1 text-sm text-gray-600">Manage your holiday packages here</p>
                </div>
            </div>
            <div class="mt-5 md:col-span-2 md:mt-0">
                @if ($errors->any())
                    <ul class="mb-8 text-red-500 text-sm list-disc">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <form action="{{ route('packages.store') }}" method="POST">
                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-2 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label
                                        for="destination"
                                        class="block text-sm font-medium text-gray-700"
                                    >
                                        Destination
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input
                                            type="text"
                                            name="destination"
                                            id="destination"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            placeholder="Vienna"
                                            value="{{ old('destination') }}"
                                        >
                                    </div>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label
                                        for="amount_per_day"
                                        class="block text-sm font-medium text-gray-700"
                                    >
                                        Amount / Per Day
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input
                                            type="text"
                                            name="amount_per_day"
                                            id="amount_per_day"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            placeholder="150.00"
                                            value="{{ old('amount_per_day') }}"
                                        >
                                    </div>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label
                                        for="expires_on"
                                        class="block text-sm font-medium text-gray-700"
                                    >
                                        Expires On
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input
                                            type="date"
                                            name="expires_on"
                                            id="expires_on"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            value="{{ old('expires_on') }}"
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
