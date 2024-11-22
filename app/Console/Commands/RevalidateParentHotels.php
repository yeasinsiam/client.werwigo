<?php

namespace App\Console\Commands;

use App\Jobs\ProcessRevalidableParentHotel;
use App\Models\ParentHotel;
use Illuminate\Console\Command;

class RevalidateParentHotels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:revalidate-parent-hotels';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Revalidate previous month parent hotels data from google api';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $parentHotels = ParentHotel::whereDate('sync_date', '<=', now()->subDays(30)->toDateString())->get();
        foreach ($parentHotels as $parentHotel) {
            ProcessRevalidableParentHotel::dispatch($parentHotel);
        }
    }
}
