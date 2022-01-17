<?php

namespace Notification\Form;

use Laminas\Form\Form;

class NotificationForm extends Form
{
    public function init()
    {
        $this->add([
            'name' => 'Notification',
            'type' => NotificationFieldset::class,
            'options' => [
                'use_as_base_fieldset' => true,
            ],
        ]);

        $this->add([
            'type' => 'submit',
            'name' => 'submit',
            'attributes' => [
                'value' => 'Insert new Notification',
            ],
        ]);
    }
}