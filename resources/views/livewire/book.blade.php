<div>
    @if (session()->has('success'))
        <div role="alert" class="mb-12">
            <div class="border border-emerald-400 rounded bg-emerald-100 px-4 py-3 text-emerald-700">
                <p>{{ session()->get('success') }}</p>
            </div>
        </div>
    @endif

    <div class="grid gap-8 grid-cols-2">
        <div>
            <h3 class="text-xl mb-3">Book a Package</h3>
            <form action="">
                <div class="mb-3">
                    <input
                        type="search"
                        placeholder="Search for a destination"
                        name="search"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        wire:model="search"
                    />
                </div>
                <x-primary-button>Search</x-primary-button>
            </form>
    
            @if ($packages->isNotEmpty())
                <div class="mt-6">
                    <h3 class="text-xl mb-2">Results Found, </h3>
                    <ul class="list-disc ml-4">
                        @foreach ($packages as $package)
                            <li class="pb-4">
                                {{ $package->destination }} (INR {{ $package->amount_per_day }} /-) | Last day : {{ $package->expires_on }}
                                <button class="text-blue-500 underline" wire:click="$set('tryingToBook', {{ $package }})">Book This Package</button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    
        @if (! is_null($tryingToBook))
            <div class="md:max-w-md">
                <h3 class="text-xl">Selected Package :  {{ $tryingToBook['destination'] }}</h3>
                <p>Fill in the below details</p>
                <form wire:submit.prevent="book">
                    <div class="mb-3">
                        <input
                            type="text"
                            placeholder="Phone Number"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            wire:model="phone"
                        />
                        @error('phone')
                            <p class="text-sm pt-2 text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input
                            type="text"
                            placeholder="Where are you from"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            wire:model="comingFrom"
                        />
                        @error('comingFrom')
                            <p class="text-sm pt-2 text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input
                            type="checkbox"
                            placeholder="Where are you from"
                            value="true"
                            wire:model="gift"
                        />
                        Gift to friend
                    </div>
                    @if (boolval($gift))
                        <div class="mb-3">
                            <input
                                type="text"
                                placeholder="Name of the friend"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                wire:model="friendName"
                            />
                            @error('friendName')
                                <p class="text-sm pt-2 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input
                                type="email"
                                placeholder="Email address of the friend"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                wire:model="friendEmail"
                            />
                            @error('friendEmail')
                                <p class="text-sm pt-2 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    @endif
                    <x-primary-button>Confirm Booking</x-primary-button>
                </form>
            </div>
        @endif
    </div>
</div>
