<?php

declare(strict_types=1);

namespace Tests\Qossmic\Deptrac;

use PHPUnit\Framework\TestCase;
use Qossmic\Deptrac\AstRunner\AstMap\ClassLikeName;
use Qossmic\Deptrac\MemoizedTokenLayerResolver;
use Qossmic\Deptrac\TokenLayerResolverInterface;

final class MemoizedTokenLayerResolverTest extends TestCase
{
    public function testGetLayersByClassLikeName(): void
    {
        $classLikeName = ClassLikeName::fromFQCN('foo');
        $decorated = $this->createMock(TokenLayerResolverInterface::class);
        $decorated->method('getLayersByTokenName')->with($classLikeName)->willReturn(['bar']);

        $decorator = new MemoizedTokenLayerResolver($decorated);

        self::assertEquals(['bar'], $decorator->getLayersByTokenName($classLikeName));
        self::assertEquals(['bar'], $decorator->getLayersByTokenName($classLikeName));
    }
}
