<?php
 namespace OCA\MyMoney\Service;

 use OCA\MyMoney\Db\Account;
 use OCA\MyMoney\Db\AccountMapper;

 use Exception;
 use OCP\AppFramework\Db\DoesNotExistException;
 use OCP\AppFramework\Db\MultipleObjectsReturnedException;



 class AccountService {
   /* @var NoteMapper */
   private $mapper;

   public function __construct(AccountMapper $mapper) {
     $this->mapper = $mapper;
   }

   private function handleException($e) {
      if ($e instanceof DoesNotExistException ||
          $e instanceof MultipleObjectsReturnedException) {
            throw new NotFoundException($e->getMessage());
      } else {
        throw $e;
      }
   }

   /*
   * @param string $userId
   */
  public function findAll(string $userId): array {
 		return $this->mapper->findAll($userId);
 	}

   /*
   * @param int $id
   * @param string $userId
   */
   public function find(int $id, string $userId) {
     try {
       return $this->mapper->find($id, $userId);
     } catch (Exception $e) {
       $this->handleException($e);
     }
   }

   /*
   * @param string $name
   * @param string $type
   */
  public function create(string $name, string $type, string $userId) {
    $account = new Account();
    $account->setName($name);
    $account->setType($type);
    $account->setUserId($userId);
    return $this->mapper->insert($account);
  }

  /*
  * @param int $id
  * @param string $name
  * @param string $type

  */
  public function update($id, $name, $type, $userId) {
  		try {
  			$account = $this->mapper->find($id, $userId);
  			$account->setName($name);
  			$account->setType($type);
  			return $this->mapper->update($account);
  		} catch (Exception $e) {
  			$this->handleException($e);
  		}
  	}

    /*
    * @param string $name
    * @param string $type
    */
  	public function delete($id, $userId) {
  		try {
  			$account = $this->mapper->find($id, $userId);
  			$this->mapper->delete($account);
  			return $account;
  		} catch (Exception $e) {
  			$this->handleException($e);
  		}
  	}


 }
