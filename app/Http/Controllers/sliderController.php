<?php

namespace App\Http\Controllers;

use App\Models\Sliders;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Location;

class sliderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    //photo uplode finaction
    public function photoUplode($photo, $old_photo=""){
        if (isset($photo)) {
             $img = $photo;
            $u_img = md5(time().rand()).'.'.$img -> getClientOriginalExtension();
            $img -> move(public_path('media/setting/slider/'),$u_img);
            if (!empty($old_photo)) {
             unlink('media/setting/slider/' . $old_photo);
            }
            return $u_img;
        }else{
            return "";
        }

    }



    //advance photo upload

    public function index(){
        $sliders = Sliders::latest() -> get();
        return view('advance slider.index',compact('sliders'));
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

    public function storeAdvanceSlide(Request $request){



        $arr_count = count($request -> title);

        $sliders =[];
        for ($i=0; $i < $arr_count; $i++) {


            $arry = [
                'title' => $request -> title[$i],
                'sub' => $request -> sub[$i],
                'Rendid' => $request -> Rendid[$i],
                'btna1_name' => $request -> btn1[$i],
                'btn1_url' => $request -> btn1_url[$i],
                'btna2_name' => $request -> btn2[$i],
                'btn2_url' => $request -> btn2_url[$i],
                'photo' => $this -> photoUplode($request -> slider_photo[$i], $request ->old_image[$i]),

            ];
            array_push($sliders,$arry);
        }


        $sliders_array = [

            'name' => $request -> name,
            'type' => $request -> type,
            'vedio_url' => $request -> vedio_url,
            'sliders' =>    $sliders,
        ];



        Sliders::create([
            'json_data' => json_encode($sliders_array)
        ]);

        return redirect() -> route('slider');



    }
    /**
     * update slider data
     */
    public function updateSliderData(Request $request){

        $arr_count = count($request -> title);
        $sliders =[];
        for ($i=0; $i < $arr_count; $i++) {
            if ($request -> new[$i] == 1) {
                $photo =$this -> photoUplode($request -> slider_photo[$i], $request ->old_image[$i]);
            }else {
                $photo = $request ->old_image[$i];
            }
            $arry = [
                'title' => $request -> title[$i],
                'sub' => $request -> sub[$i],
                'Rendid' => $request -> Rendid[$i],
                'btna1_name' => $request -> btn1[$i],
                'btn1_url' => $request -> btn1_url[$i],
                'btna2_name' => $request -> btn2[$i],
                'btn2_url' => $request -> btn2_url[$i],

                'photo' => $photo


            ];
            array_push($sliders,$arry);
        }


        $sliders_array = [

            'name' => $request -> name,
            'type' => $request -> type,
            'vedio_url' => $request -> vedio_url,
            'sliders' => $sliders,

        ];

        $slide_data = Sliders::find($request -> id);

        $slide_data -> json_data =  $sliders_array;
        $slide_data -> update();

        return back() -> with('success','slider update successfully');

    }
    /**
     * store vedio slider
     */
    public function storeVedioSLider(Request $request){

        $arr_count = count($request -> title);
        $sliders =[];
        for ($i=0; $i < $arr_count; $i++) {

            $arry = [
                'title' => $request -> title[$i],
                'sub' => $request -> sub[$i],
                'Rendid' => $request -> Rendid[$i],
                'btna1_name' => $request -> btn1[$i],
                'btn1_url' => $request -> btn1_url[$i],
                'btna2_name' => $request -> btn2[$i],
                'btn2_url' => $request -> btn2_url[$i],


            ];
            array_push($sliders,$arry);
        }


        $sliders_array = [

            'name' => $request -> name,
            'type' => $request -> type,
            'vedio_url' => $request -> vedio_url,
            'sliders' => $sliders,

        ];

        Sliders::create([
            'json_data' => json_encode($sliders_array)
        ]);

        return redirect() -> route('slider');

    }

    /**
     * show slide group
     */
    public function singleSlider($id){

        $slider_arry = Sliders::find($id);



       return view('advance slider.show_slider',compact('slider_arry'));
    }

}
