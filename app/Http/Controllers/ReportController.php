<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\Report;
use App\Models\Location;

class ReportController extends Controller
{
    public function submit_report(Request $request, Location $location){
        //Check if IP has reported within last 30 minutes
        if(Report::where('location_id', $location->id)->where('reported_by',  $request->ip())->whereBetween('created_at', [Carbon::now()->subMinutes(30), Carbon::now()])->get()->count() == 0){
            Report::create([
                'location_id'=>$location->id,
                'type'=>$request->status,
                'reported_by'=> $request->ip(),
            ]);

            //Update status, based on latested reports in last 24 hours
            $closed = $location->reports->where('type', 'closed')->where('created_at', '>', Carbon::now()->subHours(24))->count();
            $flooded = $location->reports->where('type', 'closed')->where('created_at', '>', Carbon::now()->subHours(24))->count();
            $open = $location->reports->where('type', 'open')->where('created_at', '>', Carbon::now()->subHours(24))->count();

            $largest = max($closed, $flooded, $open);

            if($largest == $closed){
                $location->status = 'closed';
                $location->save();
            }
            if($largest == $flooded){
                $location->status = 'flooded';
                $location->save();
            }
            if($largest == $open){
                $location->status = 'open';
                $location->save();
            }

            return redirect()->route('home')
                ->withSuccess('Successfully recorded your report that '.$location->name.' is '.$request->status.'');
        }else{
            return redirect()->route('home')
                ->withErrors('You already made a report for '.$location->name.' within the last 30 minutes. Please try again later. ');
        }
    }
}
