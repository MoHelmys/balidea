<?php

namespace Drupal\balidea_module\Controller;

class BalideaController {

    public function welcome() {
    
        $body = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.";

        return [
            '#theme' => 'welcome-body',
            '#body' => $body,
            '#attached' => [
                'library' => [
                    'balidea_module/custom',            
                ],
            ]
        ];

    }
}

