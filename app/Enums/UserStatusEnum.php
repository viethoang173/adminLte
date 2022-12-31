<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class UserStatusEnum extends Enum
{
    const INACTIVE = 'INACTIVE';
    const ACTIVE = 'ACTIVE';
    const PENDING = 'PENDING';
}

