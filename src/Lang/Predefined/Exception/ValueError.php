<?php

namespace Ext\Lang\Predefined\Exception;

class ValueError extends \Error
{
    const VERSION = '22.3.22';

    /* Inherited properties */
    protected string $message = "";
    private string $string = "";
    protected int $code;
    protected string $file = "";
    protected int $line;
    private array $trace = [];
    private ?\Throwable $previous = null;

    /* Inherited methods */
    final public Error::getMessage(): string
    final public Error::getPrevious(): ?\Throwable
    final public Error::getCode(): int
    final public Error::getFile(): string
    final public Error::getLine(): int
    final public Error::getTrace(): array
    final public Error::getTraceAsString(): string
    public Error::__toString(): string
    private Error::__clone(): void
}
