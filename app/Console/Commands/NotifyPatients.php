<?php

namespace App\Console\Commands;

use App\Models\Patient;
use App\Models\VaxSchedule;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

use function Symfony\Component\Clock\now;

class NotifyPatients extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:notify-patients';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::now()->toDateString();
        
        $schedules = VaxSchedule::all()
            ->whereDate('scheduled_date', $today)
            ->get();

        foreach ($schedules as $schedule) {
            $patient = $schedule->vaxRecord->patient;

            Mail::to($patient->email)->send(
                
            );
        }

    }
}
