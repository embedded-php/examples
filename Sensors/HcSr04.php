<?php
declare(strict_types = 1);

require_once __DIR__ . '/../vendor/autoload.php';

/**
 * This example measures distance using the HC-SR04 Ultrassonic sensor.
 * Requires ext-gpio (https://github.com/embedded-php/ext-gpio) to be installed.
 *
 * Assembly instructions:
 *  - VCC: Wired to 5V
 *  - Trigger: Wired to GPIO25 on a RPi
 *  - Echo: Wired to GPIO24 on a RPi
 *  - GND: Wired to GND
 */

use EmbeddedPhp\Core\Gpio\PhpGpioExt;
use EmbeddedPhp\Sensors\HcSr04;

$gpio = new PhpGpioExt('/dev/gpiochip0', PhpGpioExt::PIN_LOG);

$sensor = new HcSr04($gpio, 25, 24);
for ($i = 0; $i < 10; $i++) {
  echo 'Probe ', $i + 1, ': ', $sensor->getDistance(), ' millimeters', PHP_EOL;
  sleep(1);
}
