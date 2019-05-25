<?php

declare(strict_types=1);

namespace jokodm\Datamining\Exception;

use Exception;

class NormalizerException extends Exception
{
    public static function unknownNorm(): self
    {
        return new self('Unknown norm supplied.');
    }
}
