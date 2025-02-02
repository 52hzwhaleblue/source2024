<?php

declare(strict_types=1);

/*
 * This file is part of PHP CS Fixer.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *     Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace PhpCsFixer\RuleSet\Sets;

use PhpCsFixer\RuleSet\AbstractRuleSetDescription;
use PhpCsFixer\RuleSet\DeprecatedRuleSetDescriptionInterface;

/**
 * @internal
 *
 * @deprecated use `@PER-CS` instead
 *
 * @TODO 4.0 remove me
 *
 * Last updated to PER Coding Style v2.0.
 */
final class PERSet extends AbstractRuleSetDescription implements DeprecatedRuleSetDescriptionInterface
{
    public function getRules(): array
    {
        return [
            '@PER-CS' => true,
        ];
    }

    public function getDescription(): string
    {
        return 'Alias for the newest PER-CS rules. It is recommended you use ``@PER-CS2.0`` instead if you want to stick with stable ruleset.';
    }

    public function getSuccessorsNames(): array
    {
        return ['@PER-CS'];
    }
}
