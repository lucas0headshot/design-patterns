<?php

namespace Observer\Php\Observadores;

use SplObserver;
use SplSubject;

class ObservadorConcretoB implements SplObserver
{
    public function update(SplSubject $subject): void
    {
        if ($subject->estado == 0 || $subject->estado >= 2) {
            echo "ObservadorConcretoB: Reagiu ao evento.\n";
        }
    }
}
