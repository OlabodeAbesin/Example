<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\NotificationUsage;
use App\Services\NotificationService;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    private $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function store()
    {
        //Todo:: Return responses using Laravel resources and handle localization/translations
        return response()->json($this->notificationService->sendOfferNotification(), 200);
    }

    public function index($params = null){
        return response()->json(NotificationUsage::collection($this->notificationService->all()), 200);
    }

    public function channels():JsonResponse {
         return response()->json($this->notificationService->channels(), 200);
    }

    public function toggle($channel_id): JsonResponse
    {
        return response()->json($this->notificationService->toggle((int) $channel_id), 200);
    }

}
