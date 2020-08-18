<?php
 namespace OCA\MyMoney\Controller;

 use OCP\IRequest;
 use OCP\AppFramework\Controller;

 use OCP\AppFramework\Http\DataResponse;

 use OCA\MyMoney\Service\AccountService;

 class AccountController extends Controller {

    /* @var AccountService */
    private $service;

    /* @var string */
    private $userId;

    use Errors;

    public function __construct(string $AppName, IRequest $request, $userId, AccountService $service){
       parent::__construct($AppName, $request);
       $this->userId = $userId;
       $this->service = $service;
    }


    /**
     * @NoAdminRequired
     */
    public function index(): DataResponse {
    	return new DataResponse($this->service->findAll($this->userId));
    }

    /**
    * @NoAdminRequired
    *
    * @param int id
    */
    public function show(int $id) {
     return $this->handleNotFound(function () use ($id) {
        return $this->service->find($id, $this->userId);
     });
    }

    /**
    * @NoAdminRequired
    *
    * @param string $name
    * @param string $type
    */
    public function create(string $name, string $type) {
     $serviceResponse = $this->service->create($name, $type, $this->userId);
     return new DataResponse($serviceResponse);
    }

    /**
  	 * @NoAdminRequired
  	 */
  	public function update(int $id, string $name, string $type): DataResponse {
  		return $this->handleNotFound(function () use ($id, $name, $type) {
  			return $this->service->update($id, $name, $type, $this->userId);
  		});
  	}

  	/**
  	 * @NoAdminRequired
  	 */
  	public function destroy(int $id): DataResponse {
  		return $this->handleNotFound(function () use ($id) {
  			return $this->service->delete($id, $this->userId);
  		});
  	}

 }
