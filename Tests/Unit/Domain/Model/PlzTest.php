<?php

namespace Vendor\Key\Tests\Unit\Domain\Model;

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
 * Test case for class \Vendor\Key\Domain\Model\Plz.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author G. Wieldraaijer <grrrben@gmail.com>
 */
class PlzTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Vendor\Key\Domain\Model\Plz
	 */
	protected $subject = NULL;

	public function setUp() {
		$this->subject = new \Vendor\Key\Domain\Model\Plz();
	}

	public function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getPlzReturnsInitialValueForInt() {	}

	/**
	 * @test
	 */
	public function setPlzForIntSetsPlz() {	}

	/**
	 * @test
	 */
	public function getOrtReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getOrt()
		);
	}

	/**
	 * @test
	 */
	public function setOrtForStringSetsOrt() {
		$this->subject->setOrt('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'ort',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getStrasseReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getStrasse()
		);
	}

	/**
	 * @test
	 */
	public function setStrasseForStringSetsStrasse() {
		$this->subject->setStrasse('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'strasse',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getHausnrReturnsInitialValueForInt() {	}

	/**
	 * @test
	 */
	public function setHausnrForIntSetsHausnr() {	}

	/**
	 * @test
	 */
	public function getZusatzReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getZusatz()
		);
	}

	/**
	 * @test
	 */
	public function setZusatzForStringSetsZusatz() {
		$this->subject->setZusatz('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'zusatz',
			$this->subject
		);
	}
}
