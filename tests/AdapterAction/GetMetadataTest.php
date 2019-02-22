<?php

namespace Roundhouse\Flysystem\Cloudinary\Test\AdapterAction;

class GetMetadataTest extends ActionTestCase
{
    public function metadataProvider()
    {
        return [
            ['getMetadata'],
            ['getMimetype'],
            ['getTimestamp'],
            ['getSize'],
            ['has'],
        ];
    }

    /**
     * @dataProvider  metadataProvider
     * @param $method
     */
    public function testMetadataCallsSuccess($method)
    {
        $public_id = $path = 'file';
        $bytes = 123123;
        $created_at = date('Y-m-d H:i:s');
        $version = time();

        list ($cloudinary, $api) = $this->buildAdapter();

        $api->resource('file')->willReturn(compact('public_id', 'path', 'bytes', 'created_at', 'version'));

        $expected = [
            'type' => 'file',
            'path' => $public_id,
            'size' => $bytes,
            'timestamp' => strtotime($created_at),
            'version' => $version,
        ];
        $actual = $cloudinary->$method($public_id);

        $this->assertEquals($expected, $actual);
    }

    /**
     * @param $method
     * @dataProvider metadataProvider
     */
    public function testMetadataCallsFailure($method)
    {
        list($cloudinary, $api) = $this->buildAdapter();
        $api->resource()->willThrow('Cloudinary\Api\Error');

        $this->assertFalse($cloudinary->{$method}('path'));
    }
}
