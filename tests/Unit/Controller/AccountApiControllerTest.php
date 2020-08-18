<?php
namespace OCA\MyMoney\Tests\Unit\Controller;

require_once __DIR__ . '/AccountControllerTest.php';

class AccountApiControllerTest extends AccountControllerTest {

    public function setUp() {
        parent::setUp();
        $this->controller = new AccountApiController(
            'MyMoney', $this->request, $this->service, $this->userId
        );
    }

}
