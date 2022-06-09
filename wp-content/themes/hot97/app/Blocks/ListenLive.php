<?php

namespace App\Blocks;

use App\Blocks\Block;

class ListenLive extends Block
{
    /**
     * @inheritDoc
     */
    protected function alterContext(array $context): array
    {

        $context['fields']['listen_live'] = true;

        return $context;
    }
}
