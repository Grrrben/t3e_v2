<?php
/**
 * Created by PhpStorm.
 * User: grrrben
 * Date: 12/7/15
 * Time: 10:03 AM
 */

namespace Vendor\Key\Domain\Model;


class SampleAjaxModel
{
    /**
     * property: Title
     * @var string
     * @validate NotEmpty
     * @json true
     */
    protected $title;
}