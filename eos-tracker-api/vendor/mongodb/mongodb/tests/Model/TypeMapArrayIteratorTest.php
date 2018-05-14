<?php

namespace MongoDB\Tests;

use MongoDB\Model\TypeMapArrayIterator;

class TypeMapArrayIteratorTest extends TestCase
{
    public function testCurrentAppliesTypeMap()
    {
        $document = [
            'array' => [1, 2, 3],
            'object' => ['foo' => 'bar'],
        ];

        $typeMap = [
            'root' => 'object',
            'document' => 'object',
            'array' => 'array',
        ];

        $iterator = new TypeMapArrayIterator([$document], $typeMap);

        $expectedDocument = (object) [
            'array' => [1, 2, 3],
            'object' => (object) ['foo' => 'bar'],
        ];

        $iterator->rewind();

        $this->assertEquals($expectedDocument, $iterator->current());
    }
}
