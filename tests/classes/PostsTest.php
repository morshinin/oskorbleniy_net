<?php

include('./includes/class-autoload.inc.php');
use PHPUnit\Framework\TestCase;

final class PostsTest extends TestCase
{
    public function testRenderReturnsFuckYou()
    {
        $posts = new Posts();
        $expected = 'Fuck you';

        $this->assertEquals($expected, $posts->render());
    }
}

