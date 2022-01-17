<?php
namespace Notification\Model\Notification;

use RuntimeException;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\Adapter\Driver\ResultInterface;
use Laminas\Db\Sql\Delete;
use Laminas\Db\Sql\Insert;
use Laminas\Db\Sql\Sql;
use Laminas\Db\Sql\Update;

class NotificationDbSqlCommand implements NotificationCommandInterface
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

    public function deleteNotification(Notification $Notification)
    {
        if (! $Notification->getId()) {
            throw new RuntimeException('Cannot delete Notification; missing identifier');
        }

        $delete = new Delete('Notifications');
        $delete->where(['id = ?' => $Notification->getId()]);

        $sql = new Sql($this->db);
        $statement = $sql->prepareStatementForSqlObject($delete);
        $result = $statement->execute();

        if (! $result instanceof ResultInterface) {
            return false;
        }

        return true;
    }

    public function insertNotification(Notification $Notification)
    {
        // TODO: Implement insertNotification() method.
    }

    public function updateNotification(Notification $Notification)
    {
        // TODO: Implement updateNotification() method.
    }
}