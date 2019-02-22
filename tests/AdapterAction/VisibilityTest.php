<?php

namespace Roundhouse\Flysystem\Cloudinary\Test\AdapterAction;

/**
 * Visibility is not supported for Cloudinary,
 * so that this test just checks if the methods always return NotSupportedException
 *
 * @package Roundhouse\Flysystem\Cloudinary\Test\AdapterAction
 */
class VisibilityTest extends ActionTestCase
{
    public function testGetVisibility()
    {
        list($cloudinary) = $this->buildAdapter();
        $this->setExpectedException('\LogicException');
        $cloudinary->setVisibility('path', 'visibility');
    }

    public function testSetVisibility()
    {
        list($cloudinary) = $this->buildAdapter();
        $this->setExpectedException('\LogicException');
        $cloudinary->getVisibility('path');
    }
}
