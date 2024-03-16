<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CompanyProfileController extends Controller
{
    public function index()
    {
        $companyProfile = CompanyProfile::all()->first();
        $users = User::all();
        return view('admin.companyprofile.index', compact('companyProfile', 'users'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'description' => 'required|string',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $companyProfile = CompanyProfile::all()->first();

        if ($companyProfile->logo) {
            Storage::delete($companyProfile->logo);
        }

        if ($request->hasFile('logo')) {
            $fileName = str::random(60);
            $extension = $request->logo->extension();
            $pathName = '/storage/photos/'  . $fileName . '.' . $extension;
            Storage::put('/public/photos/' . $fileName . '.' . $extension, File::get($request->logo));

            $companyProfile->logo = $pathName;
        }

        $companyProfile->name = $request->name;
        $companyProfile->address = $request->address;
        $companyProfile->phone = $request->phone;
        $companyProfile->email = $request->email;
        $companyProfile->description = $request->description;

        $companyProfile->save();
        return redirect()->back()->with('success', 'Company Profile has been updated');
    }
}
