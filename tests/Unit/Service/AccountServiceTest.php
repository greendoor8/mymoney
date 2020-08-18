<?php
namespace OCA\MyMoney\Tests\Unit\Service;

use PHPUnit_Framework_TestCase;

use OCP\AppFramework\Db\DoesAccountxistException;

use OCA\MyMoney\Db\Account;

class AccountServiceTest extends PHPUnit_Framework_TestCase {

    private $service;
    private $mapper;
    private $userId = 'john';

    public function setUp() {
        $this->mapper = $this->getMockBuilder('OCA\MyMoney\Db\AccountMapper')
            ->disableOriginalConstructor()
            ->getMock();
        $this->service = new AccountService($this->mapper);
    }

    public function testUpdate() {
        // the existing Account
        $account = Account::fromRow([
            'id' => 3,
            'name' => 'yo',
            'type' => 'nope'
        ]);
        $this->mapper->expects($this->once())
            ->method('find')
            ->with($this->equalTo(3))
            ->will($this->returnValue($account));

        // the Account when updated
        $updatedAccount = Account::fromRow(['id' => 3]);
        $updatedAccount->setname('name');
        $updatedAccount->settype('type');
        $this->mapper->expects($this->once())
            ->method('update')
            ->with($this->equalTo($updatedAccount))
            ->will($this->returnValue($updatedAccount));

        $result = $this->service->update(3, 'name', 'type', $this->userId);

        $this->assertEquals($updatedAccount, $result);
    }


    /**
     * @expectedException OCA\AccountsTutorial\Service\NotFoundException
     */
    public function testUpdateNotFound() {
        // test the correct status code if no Account is found
        $this->mapper->expects($this->once())
            ->method('find')
            ->with($this->equalTo(3))
            ->will($this->throwException(new DoesAccountxistException('')));

        $this->service->update(3, 'name', 'type', $this->userId);
    }

}
