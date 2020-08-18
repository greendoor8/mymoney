<?php
namespace OCA\MyMoney\Controller;

use OCP\IRequest;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\ApiController;

use OCA\MyMoney\Service\AccountService;

class AccountApiController extends ApiController {

    private $service;
    private $userId;

    use Errors;

    public function __construct($AppName, IRequest $request,
                                AccountService $service, $UserId){
        parent::__construct($AppName, $request);
        $this->service = $service;
        $this->userId = $UserId;
    }

    /**
     * @CORS
     * @NoCSRFRequired
     * @NoAdminRequired
     */
    public function index() {
        return new DataResponse($this->service->findAll($this->userId));
    }

    /**
     * @CORS
     * @NoCSRFRequired
     * @NoAdminRequired
     *
     * @param int $id
     */
    public function show($id) {
        return $this->handleNotFound(function () use ($id) {
            return $this->service->find($id, $this->userId);
        });
    }

    /**
     * @CORS
     * @NoCSRFRequired
     * @NoAdminRequired
     *
     * @param string $name
     * @param string $type
     */
    public function create($name, $type) {
        return $this->service->create($name, $type, $this->userId);
    }

    /**
     * @CORS
     * @NoCSRFRequired
     * @NoAdminRequired
     *
     * @param int $id
     * @param string $name
     * @param string $type
     */
    public function update($id, $name, $type) {
        return $this->handleNotFound(function () use ($id, $name, $type) {
            return $this->service->update($id, $name, $type, $this->userId);
        });
    }

    /**
     * @CORS
     * @NoCSRFRequired
     * @NoAdminRequired
     *
     * @param int $id
     */
    public function destroy($id) {
        return $this->handleNotFound(function () use ($id) {
            return $this->service->delete($id, $this->userId);
        });
    }

}
