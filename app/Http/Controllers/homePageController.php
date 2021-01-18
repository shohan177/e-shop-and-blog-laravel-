<?php

namespace App\Http\Controllers;
use App\Models\Sliders;
use App\Models\HomePage;
use Illuminate\Http\Request;

class homePageController extends Controller
{
    public function homePageSliderUpdate(Request $request){

        $slider_data = Sliders::find($request -> slider_id);
        $slider_json = $slider_data -> json_data;

        $homepageData = HomePage::find(1);
        $homepageData -> slider = $slider_json;
        $homepageData -> update();

        return "SET";

    }
}
