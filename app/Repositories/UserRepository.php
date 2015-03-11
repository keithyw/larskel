<?php
/**
 * Created by PhpStorm.
 * User: keithwatanabe
 * Date: 3/10/15
 * Time: 11:53 AM
 */

namespace App\Repositories;

use \Cache;
use App\Profile;
use App\User;


class UserRepository implements UserRepositoryInterface{

    /**
     * @param int $userId
     * @return mixed
     */
    public function findUser($userId)
    {
        $user = [];
        $key = "user_" . $userId;
        if (Cache::has($key)){
            $user = Cache::get($key);
        }
        else{
            $user = User::find($userId);
            Cache::forever($key, $user);
        }
        return $user;
    }

    /**
     * @param string $email
     * @return mixed
     */
    public function findUserByEmail($email)
    {
        $user = [];
        $key = 'user_by_email_' . $email;
        if (Cache::has($key)){
            $user = Cache::get($key);
        }
        else{
            $user = User::whereEmail($email)->first();
            Cache::forever($key, $user);
        }
        return $user;

    }

    /**
     * @param User $user
     * @param array $data
     * @return mixed
     */
    public function addProfile(User $user, $data)
    {
        $profile = new Profile($data);
        if ($profile->isValid()){
            $user->profile()->save($profile);
            return $profile;
        }
        return ['errors' => $profile->getErrors()->getMessages()];
    }


}