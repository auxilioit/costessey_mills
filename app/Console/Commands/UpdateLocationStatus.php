<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Carbon;

use App\Models\Report;
use App\Models\Location;

class UpdateLocationStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'locations:update_status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the status of locations, based on reports in last 24 hours. This is automatically executes every 60 minutes.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $locations = Location::all();
        foreach($locations as $location){
            //Update status, based on latested reports in last 24 hours
            $closed = $location->reports->where('type', 'closed')->where('created_at', '>', Carbon::now()->subHours(24))->count();
            $flooded = $location->reports->where('type', 'flooded')->where('created_at', '>', Carbon::now()->subHours(24))->count();
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
        }
    }
}
