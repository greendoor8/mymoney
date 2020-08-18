<?php
namespace OCA\MyMoney\Tests\Integration\Controller;

use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\App;
use Test\TestCase;

use OCA\MyMoney\Db\Account;

/**
 * @group DB
 */
class AccountIntegrationTest extends TestCase {

    private $controller;
    private $mapper;
    private $userId = 'john';

    public function setUp() {
        parent::setUp();
        $app = new App('MyMoney');
        $container = $app->getContainer();

        // only replace the user id
        $container->registerService('UserId', function($c) {
            return $this->userId;
        });

        $this->controller = $container->query(
            'OCA\MyMoney\Controller\AccountController'
        );

        $this->mapper = $container->query(
            'OCA\MyMoney\Db\AccountMapper'
        );
    }

    public function testUpdate() {
        // create a new Account that should be updated
        $account = new Account();
        $account->setName('old_name');
        $account->setType('old_type');
        $account->setUserId($this->userId);

        $id = $this->mapper->insert($account)->getId();

        // fromRow does not set the fields as updated
        $updatedAccount = Account::fromRow([
            'id' => $id,
            'user_id' => $this->userId
        ]);
        $updatedAccount->setType('type');
        $updatedAccount->setName('name');

        $result = $this->controller->update($id, 'name', 'type');

        $this->assertEquals($updatedAccount, $result->getData());

        // clean up
        $this->mapper->delete($result->getData());
    }

}
