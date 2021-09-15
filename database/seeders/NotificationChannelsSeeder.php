<?php
declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationChannelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('notification_channels')->truncate();
         $channels =[
                     ['name'=> 'twilio', 'type' => 'sms', 'display_text' => 'Twilio', 'rank' => 1, 'status' => true],
                     ['name'=> 'pushy', 'type' => 'push', 'display_text' => 'Pushy', 'rank' => 2, 'status' => true],
                     ['name'=> 'mail', 'type' => 'email', 'display_text' => 'Amazon SES','rank' => 3, 'status' => true]
                    ];

          DB::table('notification_channels')->insert($channels);
    }
}
