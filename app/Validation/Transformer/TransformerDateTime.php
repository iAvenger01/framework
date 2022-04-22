<?php

namespace App\Validation\Transformer;

use App\Validation\Base\Transformer;
use DateTime;

class TransformerDateTime extends Transformer
{
    private const _FORMAT = 'Y-m-d H:i:s';

    public function transform(mixed $value): bool|DateTime
    {
        return DateTime::createFromFormat(self::_FORMAT, $value);
    }
}