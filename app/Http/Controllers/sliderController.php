<?php

namespace App\Http\Controllers;

use App\Models\Sliders;
use Illuminate\Http\Request;

class sliderController extends Controller
{
    //photo uplode finaction
    public function photoUplode($photo, $old_photo=""){

        $img = $photo;
        $u_img = md5(time().rand()).'.'.$img -> getClientOriginalExtension();
        $img -> move(public_path('media/setting/slider/'),$u_img);
        if (!empty($old_photo)) {
            unlink('media/setting/slider/' . $old_photo);
        }
        return $u_img;
    }
    public function index(){

        return view('sliders.index');
    }

    public function store(Request $request){

        if ($request -> hasFile("slider_photo1")) {
           $photo1 = $this->photoUplode($request -> slider_photo1);
       }else{$photo1 = "";}

       if ($request -> hasFile("slider_photo2")) {
           $photo2 = $this->photoUplode($request -> slider_photo2);
       }else{$photo2 = "";}

        $data = [
            'photo1' => $photo1,
            'tilte1' => $request -> tilte_1,
            'sub1' => $request -> sub_tilte_1,
            'photo2' => $photo2,
            'tilte2' => $request -> tilte_2,
            'sub2' => $request -> sub_tilte_2,

        ];

        $json_data = json_encode($data);

        Sliders::create([
            'json_data' => $json_data
        ]);
        return back() -> with('success','slider Save successfully');


    }

}
