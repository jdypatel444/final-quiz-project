<?php











namespace Composer;

use Composer\Semver\VersionParser;






class InstalledVersions
{
private static $installed = array (
  'root' => 
  array (
    'pretty_version' => '1.0.0+no-version-set',
    'version' => '1.0.0.0',
    'aliases' => 
    array (
    ),
    'reference' => NULL,
    'name' => '__root__',
  ),
  'versions' => 
  array (
    '__root__' => 
    array (
      'pretty_version' => '1.0.0+no-version-set',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => NULL,
    ),
    'firebase/php-jwt' => 
    array (
      'pretty_version' => 'v3.0.0',
      'version' => '3.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fa8a06e96526eb7c0eeaa47e4f39be59d21f16e1',
    ),
    'google/apiclient' => 
    array (
      'pretty_version' => 'v2.0.0',
      'version' => '2.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'cd4d61678bc26267f3e5371735ae3f579709ea30',
    ),
    'google/apiclient-services' => 
    array (
      'pretty_version' => 'v0.369.0',
      'version' => '0.369.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '002f610e4c3acf0636b4fb1f46314a2097e1c8b4',
    ),
    'google/auth' => 
    array (
      'pretty_version' => 'v0.8',
      'version' => '0.8.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ec4edcb043e523267973fda308d9412d7db78e17',
    ),
    'guzzlehttp/guzzle' => 
    array (
      'pretty_version' => '6.2.0',
      'version' => '6.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd094e337976dff9d8e2424e8485872194e768662',
    ),
    'guzzlehttp/promises' => 
    array (
      'pretty_version' => '1.5.3',
      'version' => '1.5.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '67ab6e18aaa14d753cc148911d273f6e6cb6721e',
    ),
    'guzzlehttp/psr7' => 
    array (
      'pretty_version' => '1.2.3',
      'version' => '1.2.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '2e89629ff057ebb49492ba08e6995d3a6a80021b',
    ),
    'monolog/monolog' => 
    array (
      'pretty_version' => '1.27.1',
      'version' => '1.27.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '904713c5929655dc9b97288b69cfeedad610c9a1',
    ),
    'phpseclib/phpseclib' => 
    array (
      'pretty_version' => '2.0.47',
      'version' => '2.0.47.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b7d7d90ee7df7f33a664b4aea32d50a305d35adb',
    ),
    'psr/cache' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd11b50ad223250cf17b86e38383413f5a6764bf8',
    ),
    'psr/http-message' => 
    array (
      'pretty_version' => '1.1',
      'version' => '1.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'cb6ce4845ce34a8ad9e68117c10ee90a29919eba',
    ),
    'psr/http-message-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'psr/log' => 
    array (
      'pretty_version' => '1.1.4',
      'version' => '1.1.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd49695b909c3b7628b6289db5479a1c204601f11',
    ),
    'psr/log-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0.0',
      ),
    ),
  ),
);







public static function getInstalledPackages()
{
return array_keys(self::$installed['versions']);
}









public static function isInstalled($packageName)
{
return isset(self::$installed['versions'][$packageName]);
}














public static function satisfies(VersionParser $parser, $packageName, $constraint)
{
$constraint = $parser->parseConstraints($constraint);
$provided = $parser->parseConstraints(self::getVersionRanges($packageName));

return $provided->matches($constraint);
}










public static function getVersionRanges($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

$ranges = array();
if (isset(self::$installed['versions'][$packageName]['pretty_version'])) {
$ranges[] = self::$installed['versions'][$packageName]['pretty_version'];
}
if (array_key_exists('aliases', self::$installed['versions'][$packageName])) {
$ranges = array_merge($ranges, self::$installed['versions'][$packageName]['aliases']);
}
if (array_key_exists('replaced', self::$installed['versions'][$packageName])) {
$ranges = array_merge($ranges, self::$installed['versions'][$packageName]['replaced']);
}
if (array_key_exists('provided', self::$installed['versions'][$packageName])) {
$ranges = array_merge($ranges, self::$installed['versions'][$packageName]['provided']);
}

return implode(' || ', $ranges);
}





public static function getVersion($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

if (!isset(self::$installed['versions'][$packageName]['version'])) {
return null;
}

return self::$installed['versions'][$packageName]['version'];
}





public static function getPrettyVersion($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

if (!isset(self::$installed['versions'][$packageName]['pretty_version'])) {
return null;
}

return self::$installed['versions'][$packageName]['pretty_version'];
}





public static function getReference($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

if (!isset(self::$installed['versions'][$packageName]['reference'])) {
return null;
}

return self::$installed['versions'][$packageName]['reference'];
}





public static function getRootPackage()
{
return self::$installed['root'];
}







public static function getRawData()
{
return self::$installed;
}



















public static function reload($data)
{
self::$installed = $data;
}
}
