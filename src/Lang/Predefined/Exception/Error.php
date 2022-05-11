<?php

namespace Ext\Lang\Predefined\Exception;

class Error implements \Throwable
{
    const VERSION = '22.3.22';

    /* Properites */
    protected string $message = "";
    private string $string = "";
    protected int $code;
    protected string $file = "";
    protected int $line;
    private array $trace = [];
    private ?\Throwable $previous = null;

    /* Methods */
    public __construct(string $message = "", int $code = 0, ?\Throwable $previous = null)
    final public getMessage(): string
    final public getPrevious(): ?\Throwable
    final public getCode(): int
    final public getFile(): string
    final public getLine(): int
    final public getTrace(): array
    final public getTraceAsString(): string
    public __toString(): string
    private __clone(): void
}
