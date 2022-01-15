<?php

namespace PushNotification\Form;

use Laminas\Form\Form;

class PushNotificationForm extends Form
{
    public function init()
    {
        $this->add([
            'name' => 'pushNotification',
            'type' => PushNotificationFieldset::class,
            'options' => [
                'use_as_base_fieldset' => true,
            ],
        ]);

        $this->add([
            'type' => 'submit',
            'name' => 'submit',
            'attributes' => [
                'value' => 'Insert new PushNotification',
            ],
        ]);
    }
}