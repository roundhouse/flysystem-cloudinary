<?php

namespace Roundhouse\Flysystem\Cloudinary;

use Roundhouse\Flysystem\Cloudinary\Test\ApiFacadeTest;

function cloudinary_url($path, array $parameters = [])
{
    return ApiFacadeTest::$cloudinary_url_result;
}

function fopen($path, $attributes)
{
    return ApiFacadeTest::$fopen_result;
}
