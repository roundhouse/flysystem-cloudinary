<?php

namespace Roundhouse\Flysystem\Cloudinary\Test\AdapterAction;

use Roundhouse\Flysystem\Cloudinary\CloudinaryAdapter;

abstract class ActionTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @return [CloudinaryAdapter, ApiFacade]
     */
    final protected function buildAdapter()
    {
        $api = $this->prophesize('\Roundhouse\Flysystem\Cloudinary\ApiFacade');

        return [new CloudinaryAdapter($api->reveal()), $api];
    }
}
