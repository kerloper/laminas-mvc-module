<?php
namespace PushNotification\Form;

use PushNotification\Model\PushNotification;
use Laminas\Form\Fieldset;
use Laminas\Hydrator\ReflectionHydrator;

class PushNotificationFieldset extends Fieldset
{
    public function init()
    {
        $this->setHydrator(new ReflectionHydrator());
        $this->setObject(new PushNotification('', ''));


        $this->add([
            'type' => 'hidden',
            'name' => 'id',
        ]);

        $this->add([
            'type' => 'text',
            'name' => 'key',
            'options' => [
                'label' => 'PushNotification key',
            ],
        ]);

        $this->add([
            'type' => 'textarea',
            'name' => 'url',
            'options' => [
                'label' => 'PushNotification url',
            ],
        ]);
    }
}