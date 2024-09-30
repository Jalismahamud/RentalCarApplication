<?php

namespace App\Http\Controllers\Backend;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aminities;

class AminitiesController extends Controller
{
    public function allAminities(){
        $aminities = Aminities::latest()->get();
        return view('backend.aminities.all_aminities',compact('aminities'));
    }

    public function addAminities(Request $request){
        return view('backend.aminities.add_aminities');
    }

    public function storeAminities(Request $request){
     $request->validate([
            'aminities_name' => 'required'
         ]);
 
         Aminities::insert([
             'aminities_name' =>$request->aminities_name
         ]);
         Helper::notification('success','Aminities Successfully Added');
         return redirect()->route('all.aminities');
    }

    public function editAminities($id){
        $aminities = Aminities::findorFail($id);
        return view('backend.aminities.edit_aminities',compact('aminities'));
    }

    public function updateAminities(Request $request,$id){
        $aminities = Aminities::findorFail($id);

        $aminities->update([
            'aminities_name' => $request->aminities_name
        ]);

     Helper::notification('success','Aminities Successfully Updated');
     return redirect()->route('all.aminities');
    }

    public function deleteAminities($id){
        Aminities::findorFail($id)->delete();

        Helper::notification('warning','Aminities Successfully Deletede');
        return redirect()->back();
    }
}
