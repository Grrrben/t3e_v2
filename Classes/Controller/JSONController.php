<?php
/**
 * Created by PhpStorm.
 * User: grrrben
 * Date: 12/7/15
 * Time: 10:42 AM
 */

namespace Vendor\Key\Controller;


/**
 * JSONController
 */
class JSONController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

    /**
     * @var string
     */
    protected $defaultViewObjectName = 'TYPO3\\CMS\\Extbase\\Mvc\\View\\JsonView';

    /**
     * action test
     *
     * @return string
     */
    public function testAction() {
        $this->view->assign('value', "001");
    }
}