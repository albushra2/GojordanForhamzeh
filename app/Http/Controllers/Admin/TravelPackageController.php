<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TravelPackageRequest;

class TravelPackageController extends Controller
{
    public function index()
    {
        $travel_packages = TravelPackage::latest()->paginate(10);
        return view('admin.travel_packages.index', compact('travel_packages'));
    }

    public function create()
    {
        return view('admin.travel_packages.create');
    }

    public function store(TravelPackageRequest $request)
    {
        if($request->validated()) {
            $data = $this->preparePackageData($request);
            $travel_package = TravelPackage::create($data);
        }

        return redirect()->route('admin.travel_packages.edit', $travel_package)
            ->with([
                'message' => 'تم إنشاء الباقة بنجاح',
                'alert-type' => 'success'
            ]);
    }

    public function edit(TravelPackage $travel_package)
    {
        $galleries = Gallery::where('travel_package_id', $travel_package->id)
                          ->latest()
                          ->paginate(10);
        
        return view('admin.travel_packages.edit', compact('travel_package', 'galleries'));
    }

    public function update(TravelPackageRequest $request, TravelPackage $travel_package)
    {
        if($request->validated()) {
            $data = $this->preparePackageData($request);
            $travel_package->update($data);
        }

        return redirect()->route('admin.travel_packages.index')
            ->with([
                'message' => 'تم تحديث الباقة بنجاح',
                'alert-type' => 'info'
            ]);
    }

    public function destroy(TravelPackage $travel_package)
    {
        $travel_package->delete();

        return redirect()->back()
            ->with([
                'message' => 'تم حذف الباقة بنجاح',
                'alert-type' => 'danger'
            ]);
    }

    /**
     * Prepare package data before saving
     */
    protected function preparePackageData($request)
    {
        $data = $request->validated();
        
        // Extract numeric value from price
        $data['price'] = (float) filter_var($data['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        
        // Generate slug
        $data['slug'] = Str::slug($data['location'], '-');
        
        return $data;
    }
}