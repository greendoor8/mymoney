<?php
namespace OCA\MyMoney\Tests\Unit\Controller;

use PHPUnit_Framework_TestCase;

use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;

use OCA\MyMoney\Service\NotFoundException;


class AccountControllerTest extends PHPUnit_Framework_TestCase {

    protected $controller;
    protected $service;
    protected $userId = 'john';
    protected $request;

    public function setUp() {
        $this->request = $this->getMockBuilder('OCP\IRequest')->getMock();
        $this->service = $this->getMockBuilder('OCA\MyMoney\Service\AccountService')
            ->disableOriginalConstructor()
            ->getMock();
        $this->controller = new AccountController(
            'mymoney', $this->request, $this->service, $this->userId
        );
    }

    public function testUpdate() {
        $account = 'just check if this value is returned correctly';
        $this->service->expects($this->once())
            ->method('update')
            ->with($this->equalTo(3),
                    $this->equalTo('name'),
                    $this->equalTo('type'),
                   $this->equalTo($this->userId))
            ->will($this->returnValue($account));

        $result = $this->controller->update(3, 'name', 'type');

        $this->assertEquals($account, $result->getData());
    }


    public function testUpdateNotFound() {
        // test the correct status code if no account is found
        $this->service->expects($this->once())
            ->method('update')
            ->will($this->throwException(new NotFoundException()));

        $result = $this->controller->update(3, 'name', 'type');

        $this->assertEquals(Http::STATUS_NOT_FOUND, $result->getStatus());
    }

}
