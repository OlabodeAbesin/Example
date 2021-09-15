<?php
declare(strict_types=1);


namespace App\Services;


use App\Models\User;
use App\Notifications\OffersNotification;
use App\Repository\Eloquent\NotificationChannelRepository;
use App\Repository\Eloquent\NotificationRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Notification;


class NotificationService {
    private $notificationRepository;
    private $notificationChannelRepository;

    public function __construct(NotificationRepository $notificationRepository, NotificationChannelRepository $notificationChannelRepository)
    {
        $this->notificationRepository = $notificationRepository;
        $this->notificationChannelRepository = $notificationChannelRepository;
    }

        public function sendOfferNotification():bool

        {
               // $userSchema = UserRepository::findById(1);
                $userSchema = User::first(); //Anti-pattern, only used for demo purposes

                $offerData = [
                    'name' => 'CONGRATS',
                    'body' => 'You received an offer.',
                    'thanks' => 'Thank you',
                    'offerText' => 'Check out the offer',
                    'offerUrl' => url('/'),
                    'offer_id' => 007
                ];

                Notification::send($userSchema, new OffersNotification($offerData));
                return true;
        }

    public function all(): Collection
    {
        return $this->notificationRepository->all();
    }

    public function channels(): Collection
    {
        return $this->notificationChannelRepository->all();
    }

    public function toggle(int $channel_id): bool
    {
        $this->notificationChannelRepository->findById($channel_id)->toggle();
        return (bool)$this->notificationChannelRepository->findById($channel_id)->status;
    }
}
