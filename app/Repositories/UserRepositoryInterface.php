<?php
/**
 * Created by PhpStorm.
 * User: keithwatanabe
 * Date: 3/10/15
 * Time: 11:47 AM
 */

namespace App\Repositories;

use App\User;

interface UserRepositoryInterface {
    /**
     * @param int $userId
     * @return mixed
     */
    public function findUser($userId);

    /**
     * @param string $email
     * @return mixed
     */
    public function findUserByEmail($email);

    /**
     * @param User $user
     * @param User $data
     * @return array
     */
    public function addProfile(User $user, $data);


}