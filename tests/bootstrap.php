<?php

/**
 * @copyright   (c) 2014 brian ridley
 * @author      brian ridley <ptlis@ptlis.net>
 * @license     http://opensource.org/licenses/MIT MIT
 *
 * PHP Version 5.3
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once __DIR__ . '/../vendor/autoload.php';

// Clear cache before running tests
if (isset($_ENV['BOOTSTRAP_CLEAR_CACHE_ENV'])) {
    $dirPath = realpath(__DIR__ . '/Fixtures/App/app/cache/' . $_ENV['BOOTSTRAP_CLEAR_CACHE_ENV']);

    if ($dirPath) {
        // From http://stackoverflow.com/a/15111679
        foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dirPath, FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST) as $path) {
            $path->isFile() ? unlink($path->getPathname()) : rmdir($path->getPathname());
        }
        rmdir($dirPath);
    }
}
