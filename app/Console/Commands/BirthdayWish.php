<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class BirthdayWish extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wish:birthday';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Wish Birthday via Email';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $data = [
            'name' => 'mrsiddiki@gmail.com',
            'primary_email' => 'mrsiddiki@gmail.com',
            'sust_email' => 'masiur@student.sust.edu',
            'secondary_email' => 'mrsiddiki@outlook.com'
        ];
        Mail::send('emails.birthday_wish', $data, function ($message) use ($data) {
            $message->from('us@example.com', 'Laravel');

            $message->to($data['primary_email'])->cc($data['sust_email']);
            $message->cc($data['secondary_email']);
        });
    }
}
