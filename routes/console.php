<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schedule;

App\Console\Commands\UpdateLocationStatus;

Schedule::command('locations:update_status')->hourly();
