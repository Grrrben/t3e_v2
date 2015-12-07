<?php
namespace Vendor\Key\Domain\Model;


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

/**
 * Plz
 */
class Plz extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * plz
	 *
	 * @var int
	 */
	protected $plz = 0;

	/**
	 * ort
	 *
	 * @var string
	 */
	protected $ort = '';

	/**
	 * strasse
	 *
	 * @var string
	 */
	protected $strasse = '';

	/**
	 * hausnr
	 *
	 * @var int
	 */
	protected $hausnr = 0;

	/**
	 * zusatz
	 *
	 * @var string
	 */
	protected $zusatz = '';

	/**
	 * Returns the plz
	 *
	 * @return int $plz
	 */
	public function getPlz() {
		return $this->plz;
	}

	/**
	 * Sets the plz
	 *
	 * @param int $plz
	 * @return void
	 */
	public function setPlz($plz) {
		$this->plz = $plz;
	}

	/**
	 * Returns the ort
	 *
	 * @return string $ort
	 */
	public function getOrt() {
		return $this->ort;
	}

	/**
	 * Sets the ort
	 *
	 * @param string $ort
	 * @return void
	 */
	public function setOrt($ort) {
		$this->ort = $ort;
	}

	/**
	 * Returns the strasse
	 *
	 * @return string $strasse
	 */
	public function getStrasse() {
		return $this->strasse;
	}

	/**
	 * Sets the strasse
	 *
	 * @param string $strasse
	 * @return void
	 */
	public function setStrasse($strasse) {
		$this->strasse = $strasse;
	}

	/**
	 * Returns the hausnr
	 *
	 * @return int $hausnr
	 */
	public function getHausnr() {
		return $this->hausnr;
	}

	/**
	 * Sets the hausnr
	 *
	 * @param int $hausnr
	 * @return void
	 */
	public function setHausnr($hausnr) {
		$this->hausnr = $hausnr;
	}

	/**
	 * Returns the zusatz
	 *
	 * @return string $zusatz
	 */
	public function getZusatz() {
		return $this->zusatz;
	}

	/**
	 * Sets the zusatz
	 *
	 * @param string $zusatz
	 * @return void
	 */
	public function setZusatz($zusatz) {
		$this->zusatz = $zusatz;
	}

}