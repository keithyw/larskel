<?php
/**
 * Created by PhpStorm.
 * User: keithwatanabe
 * Date: 3/10/15
 * Time: 11:21 AM
 */

class UserRepositoryTest extends TestCase{
    protected $_repository;

    public function setUp(){
        parent::setUp();
        $this->_repository = $this->app->make('Repositories\UserRepositoryInterface');
    }

    public function testFindUser(){
        $userId = 1;
        $user = $this->_repository->findUser($userId);
        $this->assertArrayHasKey('email', $user);
    }

    public function testFindUserByEmail(){
        $email = 'test@test.com';
        $user = $this->_repository->findUserByEmail($email);
        $this->assertArrayHasKey('email', $user);
        $this->assertEquals($email, $user['email']);
    }

    public function testAddProfile(){
        $email = 'test@test.com';
        $user = $this->_repository->findUserByEmail($email);
        $data = ['first_name' => 'firsttest', 'last_name' => 'lasttest', 'zipcode' => '90710', 'birthday' => '02/12/1975'];
        $profile = $this->_repository->addProfile($user, $data);
        $this->assertArrayHasKey('first_name', $profile);
        $this->assertEquals($data['first_name'], $profile['first_name']);
        $this->assertEquals($data['last_name'], $profile['last_name']);
        $this->assertEquals($data['zipcode'], $profile['zipcode']);
    }
}