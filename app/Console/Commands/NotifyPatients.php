<?php

namespace App\Console\Commands;

use App\Mail\EmailNotification;
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
    protected $signature = 'app:notify';

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

        $schedules = VaxSchedule::whereDate('scheduled_date', $today)
            ->where('dose_day', '>', 0)
            ->get();

        foreach ($schedules as $schedule) {
            $email = $schedule->vaxRecord->patient->email;

            $dose_number = match ($schedule->dose_day) {
                '3' => '2',
                '7' => '3',
                '14' => '4',
                '28' => '5'
            };

            Mail::to($email)->send(new EmailNotification($dose_number));
        }
    }
}
