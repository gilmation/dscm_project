<?php

/**
 * SCMSystem.
 * Each system has it's own
 * name and catch phrase
 *
 * @package    
 * @subpackage 
 * @author     
 * @version    
 */
class SCMSystem {

  //show off phrases
  protected $i_am = 'I am ';
  protected $and = ' and ';
  
  // The scm name
  protected $name = null;
  // The scm catch phrase
  protected $catch_phrase = null;

  /**
   * Construct a new SCM System
   *
   * @param string $scm_name The scm name
   * @param string $scm_catch_phrase The scm catch phrase
   */
  public function __construct($scm_name, $scm_catch_phrase) {
    $this->name = $scm_name;
    $this->catch_phrase = $scm_catch_phrase;
  }

  /**
   * Return the SCM name
   *
   * @return string The SCM name
   */
  public function getName() {
    return $this->name;
  }

  /**
   * Return the SCM catch phrase
   *
   * @return string The SCM catch phrase
   */
  public function getCatchPhrase() {
    return $this->catch_phrase;
  }

  /** 
   * Where I forget my modesty and
   * start talking about what I great 
   * system I am
   *
   * @param string The name of the SCM system
   * @return string My boastful talking
   */
  public function showOff(sfEvent $event) {

    try {
      $event['name'];
    } catch(InvalidArgumentException $iae) {
      return false;
    }

    if($this->name != $event['name'] && 'everybody' != $event['name'] ) {
        return false;
    }

    $local_array = $event->getReturnValue();

    if(!isset($local_array)) {
      $local_array = array();
    }

    $local_array[] = $this->i_am.
      $this->name.
      $this->and.
      $this->catch_phrase;

    $event->setReturnValue($local_array);
      
    return true;
  }
}
