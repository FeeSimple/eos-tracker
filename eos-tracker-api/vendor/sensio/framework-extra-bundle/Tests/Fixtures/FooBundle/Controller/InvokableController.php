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
 * @Route(service="test.invokable.predefined")
 */
class InvokableController
{
    /**
     * @Route("/invokable/predefined/service/")
     * @Template("@Foo/invokable/predefined.html.twig")
     */
    public function __invoke()
    {
        return [
            'foo' => 'bar',
        ];
    }
}
