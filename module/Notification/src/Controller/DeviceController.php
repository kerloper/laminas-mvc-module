<?php
namespace Notification\Controller;

use Notification\Model\Device\DeviceRepositoryInterface;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class DeviceController extends AbstractActionController
{
    /**
     * @var DeviceRepositoryInterface
     */
    private $deviceRepository;

    public function __construct(DeviceRepositoryInterface $deviceRepository)
    {
        $this->deviceRepository = $deviceRepository;
    }


    public function indexAction()
    {
        return new ViewModel([
            'devices' => $this->deviceRepository->findAllDevices(),
        ]);
    }

    public function detailAction( ){
        $id = $this->params()->fromRoute('id');
        try {
            $device = $this->deviceRepository->findDevice($id);
        } catch (\InvalidArgumentException $ex) {
            return $this->redirect()->toRoute('device');
        }

        return new ViewModel([
            'device' => $device,
        ]);
    }
}