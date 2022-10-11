<?php

namespace App\Http\Livewire;

use App\Models\Booking;
use App\Models\User;
use Livewire\Component;
use App\Models\HolidayPackage;
use Illuminate\Support\Facades\Hash;

class Book extends Component
{
    public $search;
    public $tryingToBook = null;
    public $gift;

    public $phone;
    public $comingFrom;
    public $friendName = null;
    public $friendEmail = null;

    protected $queryString = ['search'];

    protected $rules = [
        'phone' => 'required|digits_between:10,12',
        'comingFrom' => 'required|string|min:2|max:191',
        'friendName' => 'required_with:gift|string|nullable|min:2|max:191',
        'friendEmail' => 'required_with:gift|string|nullable|email|max:191',
    ];

    public function book()
    {
        $this->validate();

        $booking = new Booking(['booked_by' => auth()->id()]);

        if (! is_null($this->friendName)) {
            $newUser = User::create([
                'name' => $this->friendName,
                'email' => $this->friendEmail,
                'password' => Hash::make(random_int(123456789, 999999999))
            ]);

            $newUser->assignRole('user');

            $booking->booked_for = $newUser->id;
        }

        $booking->phone = $this->phone;
        $booking->coming_from = $this->comingFrom;
        $booking->save();

        $this->reset();

        session()->flash('success', 'Booking has been placed successfully!');
    }

    public function render()
    {
        return view('livewire.book', ['packages' => $this->getPackages()]);
    }

    private function getPackages()
    {
        if (empty($this->search)) {
            return collect([]);
        }

        return HolidayPackage::notExpired()->where('destination', 'like', "%{$this->search}%")->get();
    }
}
