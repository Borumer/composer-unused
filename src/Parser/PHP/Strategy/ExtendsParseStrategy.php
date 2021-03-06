<?php

declare(strict_types=1);

namespace Icanhazstring\Composer\Unused\Parser\PHP\Strategy;

use PhpParser\Node;
use PhpParser\Node\Stmt\Class_;

class ExtendsParseStrategy implements ParseStrategyInterface
{
    public function meetsCriteria(Node $node): bool
    {
        if (!$node instanceof Class_) {
            return false;
        }

        if (!$node->extends instanceof Node\Name) {
            return false;
        }

        return true;
    }

    /**
     * @param Node&Class_ $node
     * @return array<string>
     */
    public function extractNamespaces(Node $node): array
    {
        /** @var Node\Name $extends */
        $extends = $node->extends;

        return [$extends->toString()];
    }
}
