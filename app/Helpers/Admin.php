<?php

// use App\Http\Controllers\Web\v1\DocumentWallet;
use App\Models\LocationHoursDetail;
//     Transaction};
// use DB as DBS;
// use Illuminate\Pagination\Paginator;
// use Illuminate\Support\Carbon;
// use Illuminate\Support\Facades\Session;
// use App\Http\Controllers\Web\v1\CartController as CartCtrl;

class Admin
{
    public static function HoursArray(){
         return array('01:30AM','02:00AM','02:30AM','03:00AM','03:30AM','04:00AM','04:30AM','05:00AM','05:30AM','06:00AM','06:30AM','07:00AM','07:30AM','08:00AM','08:30AM','09:00AM','09:30AM','10:00AM','10:30AM','11:00AM','11:30AM','12:00PM','12:30PM','01:00PM','01:30PM','02:00PM','02:30PM','03:00PM','03:30PM','04:00PM','04:30PM','05:00PM','05:30PM','06:00PM','06:30PM','07:00PM','07:30PM','08:00PM','08:30PM','09:00PM','09:30AM','10:00AM','10:30PM','11:00PM','11:30PM','12:00AM','12:30AM','01:00AM');
    }
    
    public static function saveHourArray($location_id,$opening_time,$closing_time,$hourId = []) {
        $data = [];
        foreach ($opening_time as $key => $value) {
            $opening_day = '';
            switch ($key) {
                case 0:
                    $opening_day = 'Mon';
                    break;
                case 1:
                    $opening_day = 'Tue';
                    break;
                case 2:
                    $opening_day = 'Wed';
                    break;
                case 3:
                    $opening_day = 'Thu';
                    break;
                case 4:
                    $opening_day = 'Fri';
                    break;
                case 5:
                    $opening_day = 'Sat';
                    break;
                case 6:
                    $opening_day = 'Sun';
                    break;
            }
            if(empty($hourId)){
                LocationHoursDetail::create(['location_id'=>$location_id,'opening_day' => $opening_day,'opening_time' => $opening_time[$key],'closing_time' => $closing_time[$key]]);
            }else{
                LocationHoursDetail::where('id',$hourId[$key])->update(['location_id'=>$location_id,'opening_day' => $opening_day,'opening_time' => $opening_time[$key],'closing_time' => $closing_time[$key]]);
            }
        }
    }

}