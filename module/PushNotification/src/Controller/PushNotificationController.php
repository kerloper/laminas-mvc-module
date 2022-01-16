<?php
namespace PushNotification\Controller;

use PushNotification\Model\PushNotification\PushNotificationRepositoryInterface;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class PushNotificationController extends AbstractActionController
{
    /**
     * @var PushNotificationRepositoryInterface
     */
    private $pushNotificationRepository;

    public function __construct(PushNotificationRepositoryInterface $pushNotificationRepository)
    {
        $this->pushNotificationRepository = $pushNotificationRepository;
    }

    // Add the following method:
    public function indexAction()
    {
        return new ViewModel([
            'pushNotifications' => $this->pushNotificationRepository->findAllPushNotifications(),
        ]);
    }

    public function detailAction( ){
        $id = $this->params()->fromRoute('id');
        try {
            $pushNotification = $this->pushNotificationRepository->findPushNotification($id);
        } catch (\InvalidArgumentException $ex) {
            return $this->redirect()->toRoute('pushNotification');
        }

        return new ViewModel([
            'pushNotification' => $pushNotification,
        ]);
    }
}