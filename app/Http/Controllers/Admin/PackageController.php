<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Http\Requests\PackageRequest;
use App\Models\Coupon;
use App\Models\HolidayPackage;

class PackageController extends Controller
{
    public function index()
    {
        $packages = HolidayPackage::latest()->get();
        return view('packages.index', compact('packages'));
    }

    public function store(PackageRequest $request)
    {
        HolidayPackage::create($request->validated());
        session()->flash('success', 'Package added successfully');
        return back();
    }

    public function show(HolidayPackage $package)
    {
        $package->load('coupons');
        return view('packages.show', compact('package'));
    }

    public function syncCoupon(CouponRequest $request, HolidayPackage $package)
    {
        $coupon = new Coupon($request->validated());
        $package->coupons()->save($coupon);

        session()->flash('success', 'Coupon added successfully');

        return back();
    }
}
