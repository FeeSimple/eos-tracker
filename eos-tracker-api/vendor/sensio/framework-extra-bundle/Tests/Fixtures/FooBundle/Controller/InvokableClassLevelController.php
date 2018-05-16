<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Fixtures\FooBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route(service="test.invokable_class_level.predefined")
 * @Template("@Foo/invokable/predefined.html.twig")
 */
class InvokableClassLevelController
{
    /**
     * @Route("/invokable/class-level/service/")
     */
    public function __invoke()
    {
        return [
            'foo' => 'bar',
        ];
    }
}
