<?php

require_once('vendor/dependency-injection/lib/sfServiceContainerAutoloader.php');
require_once('vendor/yaml/lib/sfYaml.php');
require_once('vendor/event-dispatcher/lib/sfEventDispatcher.php');

require_once('SCMTaxonomy.php');
require_once('SCMSystem.php');

class SCMTaxonomyTest extends PHPUnit_Framework_TestCase {

  // The dependency injection container
  protected $container = null;

  /**
   * Initialise the Service container
   */
  public function setUp() {
    sfServiceContainerAutoloader::register();
    $this->container = new sfServiceContainerBuilder();
    $loader = new sfServiceContainerLoaderFileYaml($this->container);
    $loader->load(dirname(realpath(__FILE__)).'/systems.yml');
  }

  /**
   * Print a message to STANDARD_OUT 
   * @param $string_message The message
   */
  protected function println($string_message = '') {
    print $string_message . PHP_EOL;
  }

  /**
   * Print a message to STANDARD_OUT 
   * for each entry in the array
   * @param $message_array The messages
   */
  protected function println_array($message_array = array()) {
    foreach ($message_array as $message) {
      $this->println($message);
    }
  }

  public function testTestOurSetup() {
    $this->assertTrue(true);
  }

  public function testTheContainer() {
    $this->assertNotNull($this->container->scm_tax);
    $this->assertNotNull($this->container->scm_svn);
    $this->assertNotNull($this->container->scm_bzr);
  }

  public function testShowOfSingle() {
    $this->println_array($this->container->scm_tax->getSCMSystemToShowOff('cvs'));
  }

  public function testShowOffAll() {
    $this->println_array($this->container->scm_tax->getAllSCMSystemsToShowOff());
  }

  public function testDispatcherConnections() {
    $this->assertNotNull($this->container->scm_tax);
    $this->assertTrue($this->container->event_disp->hasListeners('scmtaxonomy.show_off'));
  }}

