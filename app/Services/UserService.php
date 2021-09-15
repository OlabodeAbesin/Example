<?php
declare(strict_types=1);


namespace App\Services;


use App\Models\User;
use App\Repository\Eloquent\UserRepository;
use Illuminate\Database\Eloquent\Model;

class UserService {

    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param $data
     * @return User|null
     */
    public function store($data): ?Model
    {
        $identifiers = [
            'email' => $data->email
        ];
        $payload = [
            'name'  => $data->name,
            'password'  => $data->password
        ];
        return $this->userRepository->updateOrCreate($identifiers, $payload);
    }


    public function index()
    {
        //Todo:: Return responses using Laravel resources and handle localization/translations
        return response()->json($this->userRepository->all(), 200);
    }

}
