<?php
namespace Notification\Controller;

use Notification\Model\Notification\NotificationRepositoryInterface;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class NotificationController extends AbstractActionController
{
    /**
     * @var NotificationRepositoryInterface
     */
    private $NotificationRepository;

    public function __construct(NotificationRepositoryInterface $NotificationRepository)
    {
        $this->NotificationRepository = $NotificationRepository;
    }

    // Add the following method:
    public function indexAction()
    {
        return new ViewModel([
            'Notifications' => $this->NotificationRepository->findAllNotifications(),
        ]);
    }

    public function detailAction( ){
        $id = $this->params()->fromRoute('id');
        try {
            $Notification = $this->NotificationRepository->findNotification($id);
        } catch (\InvalidArgumentException $ex) {
            return $this->redirect()->toRoute('Notification');
        }

        return new ViewModel([
            'Notification' => $Notification,
        ]);
    }
}