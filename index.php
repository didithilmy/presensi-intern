<?php
/**
 * Slim framework entrypoint
 */

use Slim\Views\PhpRenderer;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require 'vendor/autoload.php';

header("X-Env-Hostname: ".gethostname());

define("DEBUG_DISABLE_AUTH", false);

define("BASE_URL", getenv("BASE_URL") ?: "http://localhost/presensi-intern");
define("SERVER_URL", getenv("SERVER_URL") ?: "https://intern.tec.or.id/restsvc/public");

$dotenv = new Dotenv\Dotenv(dirname('.'));
$dotenv->load();

// Instantiate the app
$settings = require __DIR__ . '/settings.php';
$app = new \Slim\App($settings);


// Set up dependencies
require __DIR__ . '/dependencies.php';
require __DIR__ . '/middleware.php';

// Load routes
$app->group('/api', function(\Slim\App $app) {
    require_once __DIR__ . '/routes/api/meetings.php';
    require_once __DIR__ . '/routes/api/attendance.php';
    require_once __DIR__ . '/routes/api/absence.php';
});

require_once __DIR__ . '/routes/ui/meetings.php';
require_once __DIR__ . '/routes/ui/wibu.php';

/**
 * Home view
 */
$app->get('/', function ($request, $response, $args) {
    $this->renderer->render($response, "/header.php", $args);
    // $this->renderer->render($response, "/home.php", $args);
    return $this->renderer->render($response, "/footer.php", $args);
});

$app->run();
