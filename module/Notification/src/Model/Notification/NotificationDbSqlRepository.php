<?php

namespace Notification\Model\Notification;

use InvalidArgumentException;
use Notification\Model\Notification\NotificationRepositoryInterface;
use RuntimeException;
use Laminas\Hydrator\HydratorInterface;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\Adapter\Driver\ResultInterface;
use Laminas\Db\ResultSet\HydratingResultSet;
use Laminas\Db\Sql\Sql;

class NotificationDbSqlRepository implements NotificationRepositoryInterface
{
    /**
     * @var AdapterInterface
     */
    private $db;

    /**
     * @var HydratorInterface
     */
    private $hydrator;

    /**
     * @var Notification
     */
    private $NotificationPrototype;

    public function __construct(
        AdapterInterface  $db,
        HydratorInterface $hydrator,
        Notification  $NotificationPrototype
    )
    {
        $this->db = $db;
        $this->hydrator = $hydrator;
        $this->NotificationPrototype = $NotificationPrototype;
    }

    /**
     * Return a set of all blog Notification that we can iterate over.
     *
     * Each entry should be a Notification instance.
     *
     * @return Notification[]
     */
    public function findAllNotifications()
    {
        $sql = new Sql($this->db);
        $select = $sql->select('Notifications');
        $statement = $sql->prepareStatementForSqlObject($select);
        $result = $statement->execute();

        if (!$result instanceof ResultInterface || !$result->isQueryResult()) {
            return [];
        }

        $resultSet = new HydratingResultSet($this->hydrator, $this->NotificationPrototype);
        $resultSet->initialize($result);
        return $resultSet;
    }

    /**
     * Return a single blog Notification.
     *
     * @param int $id Identifier of the Notification to return.
     * @return Notification
     */
    public function findNotification($id)
    {
        $sql = new Sql($this->db);
        $select = $sql->select('Notifications');
        $select->where(['id = ?' => $id]);

        $statement = $sql->prepareStatementForSqlObject($select);
        $result = $statement->execute();

        if (!$result instanceof ResultInterface || !$result->isQueryResult()) {
            throw new RuntimeException(sprintf(
                'Failed retrieving blog Notification with identifier "%s"; unknown database error.',
                $id
            ));
        }

        $resultSet = new HydratingResultSet($this->hydrator, $this->NotificationPrototype);
        $resultSet->initialize($result);
        $Notification = $resultSet->current();

        if (!$Notification) {
            throw new InvalidArgumentException(sprintf(
                'Blog Notification with identifier "%s" not found.',
                $id
            ));
        }
        return $Notification;
    }
}