<?php

namespace PushNotification\Model\PushNotification;

use InvalidArgumentException;
use PushNotification\Model\PushNotification\PushNotificationRepositoryInterface;
use RuntimeException;
use Laminas\Hydrator\HydratorInterface;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\Adapter\Driver\ResultInterface;
use Laminas\Db\ResultSet\HydratingResultSet;
use Laminas\Db\Sql\Sql;

class PushNotificationDbSqlRepository implements PushNotificationRepositoryInterface
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
     * @var PushNotification
     */
    private $pushNotificationPrototype;

    public function __construct(
        AdapterInterface  $db,
        HydratorInterface $hydrator,
        PushNotification  $pushNotificationPrototype
    )
    {
        $this->db = $db;
        $this->hydrator = $hydrator;
        $this->pushNotificationPrototype = $pushNotificationPrototype;
    }

    /**
     * Return a set of all blog pushNotification that we can iterate over.
     *
     * Each entry should be a PushNotification instance.
     *
     * @return PushNotification[]
     */
    public function findAllPushNotifications()
    {
        $sql = new Sql($this->db);
        $select = $sql->select('pushnotification');
        $statement = $sql->prepareStatementForSqlObject($select);
        $result = $statement->execute();

        if (!$result instanceof ResultInterface || !$result->isQueryResult()) {
            return [];
        }

        $resultSet = new HydratingResultSet($this->hydrator, $this->pushNotificationPrototype);
        $resultSet->initialize($result);
        return $resultSet;
    }

    /**
     * Return a single blog pushNotification.
     *
     * @param int $id Identifier of the pushNotification to return.
     * @return PushNotification
     */
    public function findPushNotification($id)
    {
        $sql = new Sql($this->db);
        $select = $sql->select('pushNotification');
        $select->where(['id = ?' => $id]);

        $statement = $sql->prepareStatementForSqlObject($select);
        $result = $statement->execute();

        if (!$result instanceof ResultInterface || !$result->isQueryResult()) {
            throw new RuntimeException(sprintf(
                'Failed retrieving blog pushNotification with identifier "%s"; unknown database error.',
                $id
            ));
        }

        $resultSet = new HydratingResultSet($this->hydrator, $this->pushNotificationPrototype);
        $resultSet->initialize($result);
        $pushNotification = $resultSet->current();

        if (!$pushNotification) {
            throw new InvalidArgumentException(sprintf(
                'Blog pushNotification with identifier "%s" not found.',
                $id
            ));
        }
        return $pushNotification;
    }
}