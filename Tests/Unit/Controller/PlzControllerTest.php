<?php
namespace Vendor\Key\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 G. Wieldraaijer <grrrben@gmail.com>, DGF
 *  			
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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

/**
 * Test case for class Vendor\Key\Controller\PlzController.
 *
 * @author G. Wieldraaijer <grrrben@gmail.com>
 */
class PlzControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \Vendor\Key\Controller\PlzController
	 */
	protected $subject = NULL;

	public function setUp() {
		$this->subject = $this->getMock('Vendor\\Key\\Controller\\PlzController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllPlzsFromRepositoryAndAssignsThemToView() {

		$allPlzs = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$plzRepository = $this->getMock('', array('findAll'), array(), '', FALSE);
		$plzRepository->expects($this->once())->method('findAll')->will($this->returnValue($allPlzs));
		$this->inject($this->subject, 'plzRepository', $plzRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('plzs', $allPlzs);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenPlzToView() {
		$plz = new \Vendor\Key\Domain\Model\Plz();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('plz', $plz);

		$this->subject->showAction($plz);
	}

	/**
	 * @test
	 */
	public function newActionAssignsTheGivenPlzToView() {
		$plz = new \Vendor\Key\Domain\Model\Plz();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('newPlz', $plz);
		$this->inject($this->subject, 'view', $view);

		$this->subject->newAction($plz);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenPlzToPlzRepository() {
		$plz = new \Vendor\Key\Domain\Model\Plz();

		$plzRepository = $this->getMock('', array('add'), array(), '', FALSE);
		$plzRepository->expects($this->once())->method('add')->with($plz);
		$this->inject($this->subject, 'plzRepository', $plzRepository);

		$this->subject->createAction($plz);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenPlzToView() {
		$plz = new \Vendor\Key\Domain\Model\Plz();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('plz', $plz);

		$this->subject->editAction($plz);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenPlzInPlzRepository() {
		$plz = new \Vendor\Key\Domain\Model\Plz();

		$plzRepository = $this->getMock('', array('update'), array(), '', FALSE);
		$plzRepository->expects($this->once())->method('update')->with($plz);
		$this->inject($this->subject, 'plzRepository', $plzRepository);

		$this->subject->updateAction($plz);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenPlzFromPlzRepository() {
		$plz = new \Vendor\Key\Domain\Model\Plz();

		$plzRepository = $this->getMock('', array('remove'), array(), '', FALSE);
		$plzRepository->expects($this->once())->method('remove')->with($plz);
		$this->inject($this->subject, 'plzRepository', $plzRepository);

		$this->subject->deleteAction($plz);
	}
}
