<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\JobListModel;
use Carbon\Carbon;

class CloseExpiredJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jobs:close-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Close jobs whose application deadline has passed';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today = Carbon::today(); // current date

        // Only select jobs that are Active and have a deadline before today
        $jobsToClose = JobListModel::where('status', 'Active')
            ->whereDate('application_deadline', '<', $today)
            ->get();

        foreach ($jobsToClose as $job) {
            $job->update(['status' => 'Closed']);
            $this->info("Closed job: {$job->title} ({$job->id})");
        }

        $this->info('Expired jobs check completed.');
        return 0;
    }
}
