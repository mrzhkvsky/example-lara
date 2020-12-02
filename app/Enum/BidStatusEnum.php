<?php
declare(strict_types=1);

namespace App\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static BidStatusEnum OPEN()
 * @method static BidStatusEnum CLOSED()
 */
class BidStatusEnum extends Enum
{
    private const OPEN = 'open';
    private const CLOSED = 'closed';
}
