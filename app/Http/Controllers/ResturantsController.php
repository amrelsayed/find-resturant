<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchResturants;
use App\Resturant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ResturantsController extends Controller
{
    public function index(Request $request)
    {
    	$resturnats = collect();

    	if ($request->filled('meal_name') && 
    		$request->filled('latitude') && 
    		$request->filled('longitude')) {
	    		$resturnats = Resturant::whereHas('meals', function(Builder $query) {
	    		$query->where('name', 'like', '%' . request('meal_name') . '%');
	    		})
		    	->selectRaw('name, recommendations, successful_orders,
		    		ST_DISTANCE(point(?, ?), point(latitude, longitude)) * 111195 as distance', [$request->latitude, $request->longitude])
		    	->orderBy('distance')
		    	->orderBy('recommendations', 'DESC')
		    	->orderBy('successful_orders', 'DESC')
		    	->limit(3)
		    	->get();
    	}

    	if (! empty($resturnats)) {
    		foreach ($resturnats as $resturnat) {
    			$resturnat->distance = $this->beautifyDistance($resturnat->distance);
    		}
    	}
    	
    	return view('welcome', compact('resturnats'));
    }

    private function beautifyDistance($dist)
    {
    	$dist = (int) $dist;
    	if ($dist >= 1000) {
    		return $dist / 1000 . ' km';
    	} else {
    		return $dist . ' meter';
    	}
    }
}
