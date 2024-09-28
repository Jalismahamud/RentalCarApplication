<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
class AdminController extends Controller
{
    
    public function adminLogin(){
        // dd(Auth::user()->role);
        return view('admin.admin_login');
    }
    public function adminDashboard(){
        return view('admin.index');
    }



    public function adminLogout(Request $request){
      
            Auth::guard('web')->logout();
    
            $request->session()->invalidate();
    
            $request->session()->regenerateToken();
    
            return redirect('/admin/login');
        
    }


    // Admin Profile Methos
    public function adminProfile(Request $request){
        
      $id = Auth::user()->id;
      $profile = User::find($id);
      return view('admin.admin_profile_view',compact('profile'));
    }


    //update the admin profile
    // public function adminProfileUpdate(Request $request)
    // {
    //     $id = Auth::user()->id;
    //     $data = User::find($id);
 
    //     // Update user information
    //     $data->name = $request->name;
    //     $data->username = $request->username;
    //     $data->email = $request->email;
    //     $data->phone = $request->phone;
    //     $data->address = $request->address;
    
    //     // Handle photo upload
    //     if ($request->file('photo')) {
    //         if ($data->photo) {
    //             $oldImagePath = public_path('uploads/admin_images/' . $data->photo);
    //             if (file_exists($oldImagePath)) {
    //                 unlink($oldImagePath); 
    //             }
    //         }
    
    //         // Upload new photo
    //         $file = $request->file('photo');
    //         $filename = date('YmdHi') . '.' . $file->getClientOriginalExtension();
    //         $file->move(public_path('uploads/admin_images'), $filename);
    //         $data->photo = $filename; 
    //     }
    
    //     $data->save();
    //     return redirect()->back()->with('success', 'Profile updated successfully!');
    // }

    public function adminProfileUpdate(Request $request)
{
    $id = Auth::user()->id;
    $data = User::find($id);

    // Validate that at least one field is filled out (name, username, email, phone, address, or photo)
    $request->validate([
        'name' => 'nullable|string|max:255',
        'username' => 'nullable|string|max:255',
        'email' => 'nullable|email|max:255',
        'phone' => 'nullable|string|max:15',
        'address' => 'nullable|string|max:255',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
    ]);

    // Check if any field has been updated
    if (!$request->name && !$request->username && !$request->email && !$request->phone && !$request->address && !$request->file('photo')) {
        return redirect()->back()->withErrors(['error' => 'Please update at least one field.']);
    }

    // Update user information if fields are filled
    if ($request->name) $data->name = $request->name;
    if ($request->username) $data->username = $request->username;
    if ($request->email) $data->email = $request->email;
    if ($request->phone) $data->phone = $request->phone;
    if ($request->address) $data->address = $request->address;

    // Handle photo upload
    if ($request->file('photo')) {
        // Check for and delete old photo
        if ($data->photo) {
            $oldImagePath = public_path('uploads/admin_images/' . $data->photo);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // Upload new photo
        $file = $request->file('photo');
        $filename = date('YmdHi') . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/admin_images'), $filename);
        $data->photo = $filename; 
    }

    $data->save();
    $notification = array(
        'message' => 'Profile updated successfully!',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification, 'Profile updated successfully!');
}

    
}
