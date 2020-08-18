<?php
namespace OCA\MyMoney\Db;

use JsonSerializable;

use OCP\AppFramework\Db\Entity;

class Account extends Entity implements JsonSerializable {

    protected $name;
    protected $type;
    protected $userId;
    //protected $icon;

    // public function __construct() {
    //     $this->addType('id', 'integer');
    //     $this->addType('userId', 'integer');
    //     $this->addType('name', 'string');
    //     $this->addType('type', 'string');
    // }

    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'userId' => $this->userId,
        ];
    }
}
