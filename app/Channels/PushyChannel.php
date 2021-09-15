<?php
declare(strict_types=1);


namespace App\Channels;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Notifications\Notification;

class PushyChannel {


    /**
     * @const The API URL for Pushy
     * Todo:: Fetch from config with .env default
     */
    const API_URI = 'https://api.pushy.me/push';
    /**
     * @var Client
     */
    private $client;
    /**
     * @var string
     */
    private $apiKey;

    /**
     * @param Client $client
     * @param $apiKey
     */
    public function __construct(Client $client, string $apiKey)
    {
        $this->client = $client;
        $this->apiKey = $apiKey;
    }


    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param Notification $notification
     * @return void
     * @throws GuzzleException
     */

    public function send($notifiable, Notification $notification) {
        $message = $notification->toPushy($notifiable);

        if (is_null($message->getTo())) {
            if (!$to = $notifiable->routeNotificationFor('pushy', $notification)) {
                return;
            }
            $message->to($to);
        }

        $payload = [
            "to" => $message->getTo(),
            "data" => $message->getData(),
            "notification" => $message->getNotification()
        ];

        $this->client->post(
            self::API_URI . '?api_key=' . $this->apiKey,
            [
                'json' => $payload
            ]
        );

    }
}
