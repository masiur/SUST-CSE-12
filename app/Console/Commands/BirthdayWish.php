<?php

namespace App\Console\Commands;

use App\Model\Profile;
use App\Model\User;
use Carbon\Carbon;
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
        try {
            $today = Carbon::today();
//            $today = Carbon::parse('2021-09-26');
            $users = User::where('is_emailing_active', 1)
                ->whereDay('dob', '=', $today->day)
                ->whereMonth('dob', '=', $today->month)
                ->get();
            foreach ($users as $user) {
                $data = [
                    'name' => $user['name'],
                    'primary_email' => $user['email'],
                    'sust_email' => $user['sust_mail'],
                    'secondary_email' => $user['email2']
                ];
//            dd($data['primary_email']);

                Mail::send('emails.birthday_wish', $data, function ($message) use ($data) {
                    $message->from('email@masiursiddiki.com', "CSE 2012 | SUST | Birthday Wisher");
                    $message->replyTo('info@sustcse12.xyz');
                    $message->subject('Happy Birthday, '.$data['name']);
                    $message->to($data['primary_email']);
                    $message->bcc('write2moshi@gmail.com');
                    if(isset($data['sust_email'])) {
                        $message->setCc([$data['sust_email'] => '']);
                    }
                    if(isset($data['secondary_email'])) {
                        $message->setCc([$data['secondary_email'] => '']);
                    }
                });
                // email end
                $user->increment('email_counter'); // incrementing value of email counter to keep track how much emails are sent
                \Storage::prepend('birthday_wish_email.log', Carbon::now(). " Email Sent Successfully.- The data: ".json_encode($data));
            } // foreach end
        } catch (\Exception $exception) {
            \Storage::prepend('birthday_wish_email.log', Carbon::now(). " Email Sent Failed. Reason: ".$exception->getMessage()." - The data: ".json_encode($data));
        }


    }
}
