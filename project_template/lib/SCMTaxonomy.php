<?php

/**
 * SCMTaxonomy
 * A container for SCM Systems
 *
 */
class SCMTaxonomy {

  // The event dispatcher
  protected $dispatcher = null;
 
  /**
   * Construct a new SCM Taxonomy
   *
   * @param sfEventDispatcher The event dispatcher
   */
  public function __construct(sfEventDispatcher $dispatcher) {
    $this->dispatcher = $dispatcher;
  }

  /**
   * Add a SCM System to this Taxonomy
   * @param SCMSystem The SCM system
   */
  public function addSCMSystem($scm_system) {
    $this->dispatcher->connect('scmtaxonomy.show_off', array($scm_system, 'showOff'));
  }

  /**
   * Get a specific SCM to showOff
   * @param string The name of the SCM
   */
  public function getSCMSystemToShowOff($name) {
    $event = new sfEvent($this, 'scmtaxonomy.show_off', array('name' => $name));
    $this->dispatcher->notifyUntil($event);
    return $event->getReturnValue();
  }

  /**
   * Get all SCM systems to showOff
   */
  public function getAllSCMSystemsToShowOff() {
    $event = new sfEvent($this, 'scmtaxonomy.show_off', array('name' => 'everybody'));
    $this->dispatcher->notify($event);
    return $event->getReturnValue();
  }
}
