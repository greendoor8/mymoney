<?php

  namespace OCA\MyMoney\Migration;

  use Closure;
  use OCP\DB\ISchemaWrapper;
  use OCP\Migration\SimpleMigrationStep;
  use OCP\Migration\IOutput;

  class Version000002Date20200811212800 extends SimpleMigrationStep {

    /**
    * @param IOutput $output
    * @param Closure $schemaClosure The `\Closure` returns a `ISchemaWrapper`
    * @param array $options
    * @return null|ISchemaWrapper
    */
    public function changeSchema(IOutput $output, Closure $schemaClosure, array $options) {
        /** @var ISchemaWrapper $schema */
        $schema = $schemaClosure();

        if (!$schema->hasTable('mm_account')) {
            $table = $schema->createTable('mm_account');
            $table->addColumn('id', 'integer', [
                'autoincrement' => true,
                'notnull' => true,
            ]);
            $table->addColumn('name', 'string', [
                'notnull' => true,
                'length' => 200,
            ]);
            $table->addColumn('type', 'string', [
                'notnull' => true,
                'length' => 200,
                'default' => 'payment',
            ]);
            $table->addColumn('user_id', 'string', [
                'notnull' => true,
                'length' => 200,
            ]);


            $table->setPrimaryKey(['id']);
            $table->addIndex(['user_id'], 'account_user_id_index');
        }
        return $schema;
    }
}
