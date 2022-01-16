<?php
namespace PushNotification\Model\PushNotification;

use RuntimeException;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\Adapter\Driver\ResultInterface;
use Laminas\Db\Sql\Delete;
use Laminas\Db\Sql\Insert;
use Laminas\Db\Sql\Sql;
use Laminas\Db\Sql\Update;

class PushNotificationDbSqlCommand implements PushNotificationCommandInterface
{
    /**
     * @var AdapterInterface
     */
    private $db;

    /**
     * @param AdapterInterface $db
     */
    public function __construct(AdapterInterface $db)
    {
        $this->db = $db;
    }


    /**
     * {@inheritDoc}
     */

    public function deletePushNotification(PushNotification $pushNotification)
    {
        if (! $pushNotification->getId()) {
            throw new RuntimeException('Cannot delete pushNotification; missing identifier');
        }

        $delete = new Delete('pushNotification');
        $delete->where(['id = ?' => $pushNotification->getId()]);

        $sql = new Sql($this->db);
        $statement = $sql->prepareStatementForSqlObject($delete);
        $result = $statement->execute();

        if (! $result instanceof ResultInterface) {
            return false;
        }

        return true;
    }

    public function insertPushNotification(PushNotification $pushNotification)
    {
        // TODO: Implement insertPushNotification() method.
    }

    public function updatePushNotification(PushNotification $pushNotification)
    {
        // TODO: Implement updatePushNotification() method.
    }
}