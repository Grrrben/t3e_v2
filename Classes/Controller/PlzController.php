<?php
namespace Vendor\Key\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 G. Wieldraaijer <grrrben@gmail.com>, DGF
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use \TYPO3\CMS\Core\Utility\GeneralUtility as Utility;

/**
 * PlzController
 */
class PlzController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {


    /**
     * plzRepository
     *
     * @var \Vendor\Key\Domain\Repository\PlzRepository
     * @inject
     */
    protected $plzRepository = NULL;


    /**
     * action new
     *
     * @return void
     */
    public function formAction() {

        if ($_POST) {

            $plz = Utility::_GP("plz");
            $strasse = Utility::_GP("strasse");
            $nr = Utility::_GP("hausnr");
            $plzs = $this->plzRepository->where($plz, $strasse, $nr);
            $this->view->assign('plzs', $plzs);

			// post data naar view voor in form
            $this->view->assign('postPlz', $plz);
            $this->view->assign('postStrasse', $strasse);
            $this->view->assign('postNr', $nr);

            if (empty($strasse)) {
                // plz is ingevuld, strasse in autocomplete
                $strasseSet = array();
                foreach ($plzs as $a) {
                    $strasseSet[] = $a->getStrasse();
                }
                $uniqueStrasseSet = array_unique($strasseSet);
                $this->view->assign('acStrasse', $uniqueStrasseSet);
            } elseif (empty($nr)) {
                // plz & strasse ingevuld, nr in autocomplete
                $nrSet = array();
                foreach ($plzs as $a) {
                    $nrSet[] = $a->getHausnr();
                }
                $uniqueNrSet = array_unique($nrSet);
                $this->view->assign('acNr', $uniqueNrSet);
            }
        }

        // pak de DISTINCT values van de plz col
        $uniquePlz = $this->plzRepository->getUniquePlz();
        $this->view->assign('acPlz', $uniquePlz);

    }


    /**
     * @url
     * https://docs.typo3.org/typo3cms/extensions/wildside_extbase/ExtWildsideExtbaseFramework/HowToUseTheAjaxFeatures/ModifyingControllerActionsToReturnTheProperJsonAjaxValues/Index.html
     */
    public function ajaxjsonAction() {

        $returnObject = new stdClass();
        $returnObject->foo = 'bar';
        $stringRepresentation = json_encode($returnObject, JSON_FORCE_OBJECT);
        return $stringRepresentation;
    }


	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$plzs = $this->plzRepository->findAll();
		$this->view->assign('plzs', $plzs);
	}

	/**
	 * action show
	 *
	 * @param \Vendor\Key\Domain\Model\Plz $plz
	 * @return void
	 */
	public function showAction(\Vendor\Key\Domain\Model\Plz $plz) {
		$this->view->assign('plz', $plz);
	}

	/**
	 * action new
	 *
	 * @return void
	 */
	public function newAction() {
		
	}

	/**
	 * action create
	 *
	 * @param \Vendor\Key\Domain\Model\Plz $newPlz
	 * @return void
	 */
	public function createAction(\Vendor\Key\Domain\Model\Plz $newPlz) {
		$this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->plzRepository->add($newPlz);
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param \Vendor\Key\Domain\Model\Plz $plz
	 * @ignorevalidation $plz
	 * @return void
	 */
	public function editAction(\Vendor\Key\Domain\Model\Plz $plz) {
		$this->view->assign('plz', $plz);
	}

	/**
	 * action update
	 *
	 * @param \Vendor\Key\Domain\Model\Plz $plz
	 * @return void
	 */
	public function updateAction(\Vendor\Key\Domain\Model\Plz $plz) {
		$this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->plzRepository->update($plz);
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param \Vendor\Key\Domain\Model\Plz $plz
	 * @return void
	 */
	public function deleteAction(\Vendor\Key\Domain\Model\Plz $plz) {
		$this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->plzRepository->remove($plz);
		$this->redirect('list');
	}

}