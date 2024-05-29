<?php

namespace Observer\Php;

require __DIR__ . '/vendor/autoload.php';

use Observer\Php\Sujeito;
use Observer\Php\Observadores\ObservadorConcretoA;
use Observer\Php\Observadores\ObservadorConcretoB;

require __DIR__ .'/Sujeito.php';
require __DIR__ .'/Observadores/ObservadorConcretoA.php';
require __DIR__ .'/Observadores/ObservadorConcretoB.php';


/**
 * O PHP possui algumas interfaces embutidas relacionadas ao padrão Observer.
 *
 * Aqui está a interface Subject:
 *
 * @link http://php.net/manual/pt_BR/class.splsubject.php
 *
 *     interface SplSubject
 *     {
 *         // Anexa um observador ao sujeito.
 *         public function attach(SplObserver $observer);
 *
 *         // Desanexa um observador do sujeito.
 *         public function detach(SplObserver $observer);
 *
 *         // Notifica todos os observadores sobre um evento.
 *         public function notify();
 *     }
 *
 * Também existe uma interface embutida para Observadores:
 *
 * @link http://php.net/manual/pt_BR/class.splobserver.php
 *
 *     interface SplObserver
 *     {
 *         public function update(SplSubject $subject);
 *     }
 */


$sujeito = new Sujeito();

$o1 = new ObservadorConcretoA();
$sujeito->attach($o1);

$o2 = new ObservadorConcretoB();
$sujeito->attach($o2);

$sujeito->algumaLogicaDeNegocio();
$sujeito->algumaLogicaDeNegocio();

$sujeito->detach($o2);

$sujeito->algumaLogicaDeNegocio();
