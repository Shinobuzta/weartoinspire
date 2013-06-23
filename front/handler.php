<?php //-->
class Front_Handler extends Eden_Class {
    /* Constants
    -------------------------------*/
    /* Public Properties
    -------------------------------*/
    /* Protected Properties
    -------------------------------*/
    /* Private Properties
    -------------------------------*/
    /* Magic
    -------------------------------*/
    public function __construct() {
        front()->listen('init')
            ->listen('config',       $this, 'output')
            ->listen('session',  $this, 'output')
            ->listen('request',  $this, 'output')
            ->listen('response',     $this, 'output')
            ->listen('head',         $this, 'output')
            ->listen('body',         $this, 'output')
            ->listen('foot',         $this, 'output');
    }
     
    /* Public Methods
    -------------------------------*/
    public function output($event, $action) {
        echo $action.'<br />';
        return $this;
    }
     
    /* Protected Methods
    -------------------------------*/
    /* Private Methods
    -------------------------------*/
}