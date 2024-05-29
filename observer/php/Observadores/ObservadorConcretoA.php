<?php

namespace Observer\Php\Observadores;

use SplObserver;
use SplSubject;

/**
 * Observadores Concretos reagem às atualizações emitidas pelo Sujeito ao qual foram anexados.
 */
class ObservadorConcretoA implements SplObserver
{
    public function update(SplSubject $subject): void
    {
        if ($subject->estado < 3) {
            echo "ObservadorConcretoA: Reagiu ao evento.\n";
        }
    }
}
