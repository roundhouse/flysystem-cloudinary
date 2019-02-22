<?php

namespace Roundhouse\Flysystem\Cloudinary\Test\AdapterAction;

/**
 * Class RenameTest
 * @package Roundhouse\Flysystem\Cloudinary\Test\AdapterAction
 * @todo what to do with folder rename?
 */
class RenameTest extends ActionTestCase
{
    public function testReturnsFalseOnFailure()
    {
        list($cloudinary, $api) = $this->buildAdapter();
        $api->rename('old', 'new')->willThrow('Cloudinary\Error');
        $this->assertFalse($cloudinary->rename('old', 'new'));
    }

    public function testReturnsTrueOnSuccess()
    {
        list($cloudinary, $api) = $this->buildAdapter();
        $api->rename('old', 'new')->willReturn(['public_id' => 'new']);
        $this->assertTrue($cloudinary->rename('old', 'new'));
    }
}
