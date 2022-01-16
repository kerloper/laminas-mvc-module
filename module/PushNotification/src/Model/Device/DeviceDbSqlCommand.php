<?php
namespace PushNotification\Model\Device;

use RuntimeException;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\Adapter\Driver\ResultInterface;
use Laminas\Db\Sql\Delete;
use Laminas\Db\Sql\Insert;
use Laminas\Db\Sql\Sql;
use Laminas\Db\Sql\Update;

class DeviceDbSqlCommand implements DeviceCommandInterface
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

    public function deleteDevice(Device $device)
    {
        if (! $device->getId()) {
            throw new RuntimeException('Cannot delete device; missing identifier');
        }

        $delete = new Delete('device');
        $delete->where(['id = ?' => $device->getId()]);

        $sql = new Sql($this->db);
        $statement = $sql->prepareStatementForSqlObject($delete);
        $result = $statement->execute();

        if (! $result instanceof ResultInterface) {
            return false;
        }

        return true;
    }

    public function insertDevice(Device $device)
    {
        // TODO: Implement insertDevice() method.
    }

    public function updateDevice(Device $device)
    {
        // TODO: Implement updateDevice() method.
    }
}