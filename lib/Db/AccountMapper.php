<?php
namespace OCA\MyMoney\Db;

use OCP\IDbConnection;
use OCP\DB\QueryBuilder\IQueryBuilder;
use OCP\AppFramework\Db\QBMapper;

class AccountMapper extends QBMapper {

    public function __construct(IDbConnection $db) {
        parent::__construct($db, 'mm_account', Account::class);
    }

    /**
    	 * @param int $id
    	 * @param string $userId
    	 * @return Entity|Account
    	 * @throws \OCP\AppFramework\Db\MultipleObjectsReturnedException
    	 * @throws DoesNotExistException
    	 */
    public function find(int $id, string $userId): Account {
        // @var $qb IQueryBuilder
        $qb = $this->db->getQueryBuilder();
        $qb->select('*')
                 ->from('mm_account')
                 ->where($qb->expr()->eq('id', $qb->createNamedParameter($id, IQueryBuilder::PARAM_INT)))
                 ->andWhere($qb->expr()->eq('user_id', $qb->createNamedParameter($userId)));
        return $this->findEntity($qb);
    }

    /**
    	 * @param string $userId
    	 * @return array
    	 */
  	public function findAll(string $userId): array {
  		/* @var $qb IQueryBuilder */
  		$qb = $this->db->getQueryBuilder();
  		$qb->select('*')
  			->from('mm_account')
  			->where($qb->expr()->eq('user_id', $qb->createNamedParameter($userId)));
  		return $this->findEntities($qb);
  	}

}
