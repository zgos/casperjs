#!/usr/bin/env php
<?php

function supported_engines() {
  return array(
    'phantomjs' => array(
      'native_args' => array(
        'cookies-file', 'config', 'debug', 'disk-cache', 'disk-cache-path',
        'ignore-ssl-errors', 'load-images', 'load-plugins', 'local-url-access',
        'local-storage-path', 'local-storage-quota', 'offline-storage-path',
        'offline-storage-quota', 'local-to-remote-url-access', 'max-disk-cache-size',
        'output-encoding', 'proxy', 'proxy-auth', 'proxy-type',
        'remote-debugger-port', 'remote-debugger-autorun', 'script-encoding',
        'script-language', 'ssl-protocol', 'ssl-ciphers', 'ssl-certificates-path',
        'ssl-client-certificate-file', 'ssl-client-key-file',
        'ssl-client-key-passphrase', 'web-security', 'webdriver',
        'webdriver-logfile', 'webdriver-loglevel', 'webdriver-selenium-grid-hub',
        'wd', 'w'
      ), 'env_varname' => 'PHANTOMJS_EXECUTABLE', 'default_exec' => 'phantomjs'
    ),
    'slimerjs' =>
    array(
      'native_args' =>
      array(
        '-P', '-jsconsole', '-CreateProfile', '-profile', 'error-log-file',
        'user-agent', 'viewport-width', 'viewport-height', 'cookies-file',
        'config', 'debug', 'disk-cache', 'ignore-ssl-errors', 'load-images',
        'load-plugins', 'local-storage-path', 'local-storage-quota',
        'local-to-remote-url-access', 'max-disk-cache-size', 'output-encoding',
        'proxy', 'proxy-auth', 'proxy-type', 'remote-debugger-port',
        'remote-debugger-autorun', 'script-encoding', 'ssl-protocol',
        'ssl-certificates-path', 'web-security', 'webdriver', 'webdriver-logfile',
        'webdriver-loglevel', 'webdriver-selenium-grid-hub', 'wd', 'w'
      ), 'env_varname' => 'SLIMERJS_EXECUTABLE', 'default_exec' => 'slimerjs'
    )
  );
}

$script = array_shift($_SERVER['argv']);

define('ENGINE', 'phantomjs');
define('ENGINE_EXECUTABLE', '/Users/zhaoyukun/phantomjs-2.1.1-macosx/bin/phantomjs');
define('CASPER_PATH', getcwd());
$CASPER_COMMAND = array();
$CASPER_ARGS = array();
$CASPER_COMMAND[] = ENGINE_EXECUTABLE;
$CASPER_COMMAND[] = implode('/', array(CASPER_PATH, 'bin', 'bootstrap.js'));
$CASPER_COMMAND[] = sprintf('--casper-path=%s', CASPER_PATH);
$CASPER_COMMAND[] = '--cli';

foreach($_SERVER['argv'] as $param) {
  $CASPER_COMMAND[] = $param;
}

exec(implode(' ', $CASPER_COMMAND), $output, $return);

echo implode("\n", $output);
