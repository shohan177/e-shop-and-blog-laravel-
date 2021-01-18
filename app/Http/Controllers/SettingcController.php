<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use App\Models\Setting;

use Hamcrest\Core\Set;
use Illuminate\Http\Request;

use function GuzzleHttp\json_decode;

class SettingcController extends Controller
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
    //photo uplode function
    public function photoUplode($photo, $old_photo){

        $img = $photo;
        $u_img = md5(time().rand()).'.'.$img -> getClientOriginalExtension();
        $img -> move(public_path('media/setting/logo/'),$u_img);
        if (!empty($old_photo)) {
            unlink('media/setting/logo/' . $old_photo);
        }
        return $u_img;
    }

    public function settingIndex(){
        return view('settings.index');
    }

    public function logoUpdate(Request $request ){

        if ($request -> hasFile('logo')) {
           $logo_name = $this-> photoUplode($request -> logo, $request -> logo_old);

        }else{
            $logo_name = $request -> logo_old;
        }

        if ($request -> hasFile('stike_logo')) {
            $stike_logo_name = $this-> photoUplode($request -> stike_logo, $request -> stkie_photo_old);

         }else{
             $stike_logo_name = $request -> stkie_photo_old;
         }

         $settingData = Setting::find(1);
         $settingData -> logo_name = $logo_name;
         $settingData -> stkie_logo_name = $stike_logo_name;
         $settingData -> logo_width = $request -> size;
         $settingData -> stike_logo_width = $request -> stike_size;
         $settingData -> update();

         return "Logo";



    }

    public function showAll(){
        $data = Setting::find(1);

        $data_pack = [
            'logo_name' =>  $data -> logo_name,
            'stkie_logo_name' =>  $data -> stkie_logo_name,
            'social' => json_decode($data -> social),
        ];

        return $data_pack;

    }

    public function linksUpdate(Request $request){
        $socal_data = [
            'fb' => $request -> fb,
            'tw' => $request -> tw,
            'lnk' => $request -> lnk,
            'ins' => $request -> ins,
            'web' => $request -> web,


        ];

        $jason_data =json_encode( $socal_data);

        $settingData = Setting::find(1);
        $settingData -> social =  $jason_data;
        $settingData -> update();
        return "Links";

    }




}
