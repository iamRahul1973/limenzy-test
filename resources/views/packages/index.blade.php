<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-12">

        <div class="overflow-x-auto relative">
            <div class="mb-8">
                <a class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    href="{{ route('packages.create') }}">Create New Package</a>
            </div>

            <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Sl No
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Destination
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Amount Per Day
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Expires At
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($packages as $package)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->index + 1 }}
                            </th>
                            <td class="py-4 px-6">
                                <a href="{{ route('packages.show', $package->id) }}" class="underline text-blue-500">
                                    {{ $package->destination }}
                                </a>
                            </td>
                            <td class="py-4 px-6">
                                {{ $package->amount_per_day }} /-
                            </td>
                            <td class="py-4 px-6">
                                {{ $package->expires_on }}
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
