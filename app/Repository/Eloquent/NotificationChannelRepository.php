<?php
declare(strict_types=1);


namespace App\Repository\Eloquent;



use App\Models\NotificationChannel;
use App\Repository\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class NotificationChannelRepository extends BaseRepository implements EloquentRepositoryInterface{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param User $model
     */
    public function __construct(NotificationChannel $model)
    {
        $this->model = $model;
    }

    public function toggle():bool    {
        return $this->model->toggle()->save();
    }
}
