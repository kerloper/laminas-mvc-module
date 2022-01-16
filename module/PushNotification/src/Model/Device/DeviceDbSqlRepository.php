<?php

namespace PushNotification\Model\Device;

use InvalidArgumentException;
use RuntimeException;

use Laminas\Hydrator\HydratorInterface;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\Adapter\Driver\ResultInterface;
use Laminas\Db\ResultSet\HydratingResultSet;
use Laminas\Db\Sql\Sql;

class DeviceDbSqlRepository implements DeviceRepositoryInterface
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
     * @var Device
     */
    private $devicePrototype;

    public function __construct(
        AdapterInterface  $db,
        HydratorInterface $hydrator,
        Device  $devicePrototype
    )
    {
        $this->db = $db;
        $this->hydrator = $hydrator;
        $this->devicePrototype = $devicePrototype;
    }



    public function findAllDevices()
    {
        // TODO: Implement findAllDevices() method.
        $sql = new Sql($this->db);
        $select = $sql->select('devices');
        $statement = $sql->prepareStatementForSqlObject($select);
        $result = $statement->execute();

        if (!$result instanceof ResultInterface || !$result->isQueryResult()) {
            return [];
        }

        $resultSet = new HydratingResultSet($this->hydrator, $this->devicePrototype);
        $resultSet->initialize($result);
        return $resultSet;
    }

    public function findDevice($id)
    {
        // TODO: Implement findDevice() method.
        $sql = new Sql($this->db);
        $select = $sql->select('devices');
        $select->where(['id = ?' => $id]);

        $statement = $sql->prepareStatementForSqlObject($select);
        $result = $statement->execute();

        if (!$result instanceof ResultInterface || !$result->isQueryResult()) {
            throw new RuntimeException(sprintf(
                'Failed retrieving blog pushNotification with identifier "%s"; unknown database error.',
                $id
            ));
        }

        $resultSet = new HydratingResultSet($this->hydrator, $this->devicePrototype);
        $resultSet->initialize($result);
        $device = $resultSet->current();

        if (!$device) {
            throw new InvalidArgumentException(sprintf(
                'Blog pushNotification with identifier "%s" not found.',
                $id
            ));
        }
        return $device;
    }
}