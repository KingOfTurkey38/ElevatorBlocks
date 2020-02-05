<?php

declare(strict_types=1);

namespace KingOfTurkey38\ElevatorBlocks;

use pocketmine\block\BlockFactory;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase
{

    public function onEnable(): void
    {
        BlockFactory::registerBlock(new ElevatorBlock(), true);
    }
}
