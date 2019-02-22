<?php

namespace Roundhouse\Flysystem\Cloudinary\Test\Plugin;

use Roundhouse\Flysystem\Cloudinary\CloudinaryAdapter;
use Roundhouse\Flysystem\Cloudinary\Plugin\GetUrl;
use League\Flysystem\Filesystem;

class GetUrlTest extends \PHPUnit_Framework_TestCase
{
    public function testPassesTransformationToUrl()
    {
        list ($filesystem, $facade) = $this->mockFacade();
        $transformations = ['width' => 600, 'height' => 600];
        $facade->url('test.jpg', $transformations)->willReturn('http://cloudinary.url/test');

        $content = $filesystem->getUrl('test.jpg', $transformations);
        $this->assertEquals('http://cloudinary.url/test', $content);
    }

    private function mockFacade()
    {
        $api = $this->prophesize('\Roundhouse\Flysystem\Cloudinary\ApiFacade');

        $filesystem = new Filesystem(new CloudinaryAdapter($api->reveal()), ['disable_asserts' => true]);
        $filesystem->addPlugin(new GetUrl($api->reveal()));

        return [$filesystem, $api];
    }
}
