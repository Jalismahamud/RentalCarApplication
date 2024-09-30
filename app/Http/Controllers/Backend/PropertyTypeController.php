<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use PhpParser\Builder\Property;
use App\Helpers\Helper;

class PropertyTypeController extends Controller
{
    
    public function allType(Request $request){
        $types = PropertyType::latest()->get();
        return view('backend.type.all_type',compact('types'));
    }

    public function addType(Request $request){
         return view('backend.type.add_type');
    }

    public function storeType(Request $request){
        $request->validate([
            'type_name' => 'required|unique:property_types',
            'type_icon' => 'required'
        ]);
        PropertyType::insert([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon
        ]);

        Helper::notification('success','Property Type Added Successfully');
        return redirect()->route('all.types');
    }


    Public function editType($id){
        $type = PropertyType::findorFail($id);
        return view('backend.type.edit_type',compact('type'));
    }

    public function updateType(Request $request, $id) {
      
        $propertyType = PropertyType::findOrFail($id);
    
        $propertyType->update([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon
        ]);
    
        Helper::notification('success','Property Type Updated Successfully');
    
        return redirect()->route('all.types');
    }

    public function deleteType($id){
      PropertyType::findorFail($id)->delete();

        Helper::notification('warning','Property Type Deleted Successfully');
        return redirect()->back();
    }
    
    
}
