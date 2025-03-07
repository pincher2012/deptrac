<?php

declare(strict_types=1);

namespace Tests\Qossmic\Deptrac\Exception\File;

use PHPUnit\Framework\TestCase;
use Qossmic\Deptrac\Exception\File\CouldNotReadFileException;
use RuntimeException;

/**
 * @covers \Qossmic\Deptrac\Exception\File\CouldNotReadFileException
 */
final class CouldNotReadFileExceptionTest extends TestCase
{
    public function testIsRuntimeException(): void
    {
        $exception = new CouldNotReadFileException();

        self::assertInstanceOf(RuntimeException::class, $exception);
    }

    public function testFromFilenameReturnsException(): void
    {
        $filename = __FILE__;

        $exception = CouldNotReadFileException::fromFilename($filename);

        $message = sprintf(
            'File "%s" cannot be read.',
            $filename
        );

        self::assertSame($message, $exception->getMessage());
    }
}
