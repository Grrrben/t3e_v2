<?php
namespace Vendor\Key\Domain\Repository;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015
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
 * The repository for Plzs
 */
class PlzRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

    // Example for repository wide settings
    public function initializeObject() {
        /** @var $querySettings \TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings */
        $querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');
        $querySettings->setRespectStoragePage(FALSE);
        $this->setDefaultQuerySettings($querySettings);
    }

    public function where ($plz, $strasse = '', $nr = '', $zu = '') {

        // pid slaat op de pagina waarop het db record is aangemaakt.
        // dit is niet nodig, voor nu even ignoren
        // @todo hele pid en alles eruit slopen
        $querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');
        $querySettings->setRespectStoragePage(FALSE);
        $this->setDefaultQuerySettings($querySettings);

        $query = $this->createQuery();

        $chain = $query->logicalAnd(
            $query->equals('plz', $plz)
        );

        // @todo dit werkt maar is belachelijke code
        // maar chainen moet ineens...
        if (!empty($strasse)) {
            $chain = $query->logicalAnd(
                $query->equals('plz', $plz),
                $query->equals('strasse', $strasse)
            );

            if (!empty($nr)) {
                $chain = $query->logicalAnd(
                    $query->equals('plz', $plz),
                    $query->equals('strasse', $strasse),
                    $query->equals('hausnr', $nr)
                );

                if (!empty($zu)) {
                    $chain = $query->logicalAnd(
                        $query->equals('plz', $plz),
                        $query->equals('strasse', $strasse),
                        $query->equals('hausnr', $nr),
                        $query->equals('zusatz', $zu)
                    );
                }
            }
        }

        $query->matching(
            $chain
        );


//        /** @var Typo3DbQueryParser $queryParser */
//        $queryParser = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Storage\\Typo3DbQueryParser');
//        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($queryParser->parseQuery($query));

        $result = $query->execute();
        return $result;
    }

    public function getUniquePlz () {

        $query = $this->createQuery();
        $query->getQuerySettings()->setReturnRawQueryResult(TRUE);
        $query->statement('SELECT DISTINCT plz FROM tx_key_domain_model_plz');
        return $query->execute();

    }
	
}