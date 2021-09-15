<?php
declare(strict_types=1);


namespace App\Repository\Eloquent;


use App\Models\Notification;
use App\Repository\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class NotificationRepository extends BaseRepository implements EloquentRepositoryInterface{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Notification $model)
    {
        $this->model = $model;
    }
}
