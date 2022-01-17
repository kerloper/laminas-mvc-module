<?php
namespace Notification\Form;

use Notification\Model\Notification;
use Laminas\Form\Fieldset;
use Laminas\Hydrator\ReflectionHydrator;

class NotificationFieldset extends Fieldset
{
    public function init()
    {
        $this->setHydrator(new ReflectionHydrator());
        $this->setObject(new Notification('', ''));


        $this->add([
            'type' => 'hidden',
            'name' => 'id',
        ]);

        $this->add([
            'type' => 'text',
            'name' => 'key',
            'options' => [
                'label' => 'Notification key',
            ],
        ]);

        $this->add([
            'type' => 'textarea',
            'name' => 'url',
            'options' => [
                'label' => 'Notification url',
            ],
        ]);
    }
}