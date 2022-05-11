<?php

namespace Ext\Lang\Predefined\Interfaces;

interface Throwable extends \Stringable
{
    const VERSION = '22.3.22';

    /* Methods */
    public getMessage(): string
    public getCode(): int
    public getFile(): string
    public getLine(): int
    public getTrace(): array
    public getTraceAsString(): string
    public getPrevious() ?\Throwable
    abstract public __toString(): string

    /* Inherited methods */
    public Stringable::__toString(): string
}
