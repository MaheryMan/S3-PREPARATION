<?php

declare(strict_types=1);

require __DIR__ . '/../src/tracy.php';

use Tracy\Debugger;

// For security reasons, Tracy is visible only on localhost.
// You may force Tracy to run in development mode by passing the Debugger::Development instead of Debugger::Detect.
Debugger::enable(Debugger::Detect, __DIR__ . '/log');


if (isset($_GET['sleep'])) {
	header('Content-Type: application/javascript');
	sleep(10);
	exit;
}

?>
<!DOCTYPE html><html class=arrow><link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/style.css">

<h1>Tracy: Preloading</h1>

<?php Debugger::renderLoader() ?>

<script src="?sleep=1"></script>


<?php

if (Debugger::$productionMode) {
	echo '<p><b>For security reasons, Tracy is visible only on localhost. Look into the source code to see how to enable Tracy.</b></p>';
}
