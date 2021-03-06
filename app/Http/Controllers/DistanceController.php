<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distance;

class DistanceController extends Controller
{
    const R = 6371; // Radius of the earth in km
    
    public static function index()
    {
        $emp_addresses       = Distance::getEmployeesAddresses();
        $resigned_addresses = Distance::getResignedPeopleAddresses();
// dd($emp_addresses_json.length);
        return view('distance', compact('emp_addresses', 'resigned_addresses'));
    }
    
    // get the Distance from (lat1, lon1) to (lat2, lon2)
    private static function getDistanceFromLatLonInKm($lat1, $lon1, $lat2, $lon2) {
        $dLat = deg2rad($lat2-$lat1);  // deg2rad below
        $dLon = deg2rad($lon2-$lon1); 
        $a = 
           sin($dLat/2) * sin($dLat/2) +
           cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * 
           sin($dLon/2) * sin($dLon/2)
           ; 
        $c = 2 * atan2(sqrt($a), sqrt(1-$a)); 
        $d = R * $c; // Distance in km
        return $d;
    }
    
    private static function deg2rad($deg) {
        return $deg * (pi()/180);
    }
    
}
