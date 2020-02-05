<?php

namespace KingOfTurkey38\ElevatorBlocks;

use pocketmine\block\StonePressurePlate;
use pocketmine\entity\Entity;
use pocketmine\Player;

class ElevatorBlock extends StonePressurePlate
{

    public function getName(): string
    {
        return "Elevator Block";
    }

    public function onEntityCollide(Entity $entity): void
    {
        if ($entity instanceof Player) {
            $y = $entity->getY();
            $x = $entity->getX();
            $z = $entity->getZ();
            $level = $entity->getLevel();

            if ($entity->getY() - $this->getY() > 0.20) {
                for ($i = $y + 1; $i < 255; ++$i) {
                    $block = $level->getBlockAt($x, $i, $z);
                    if ($block->getId() === $this->getId()) {
                        $entity->teleport($block->asVector3());
                        break;
                    }
                }
            }

            if ($entity->isSneaking()) {
                for ($i = 0; $i < $y; ++$i) {
                    $block = $level->getBlockAt($x, $i, $z);
                    if ($block->getId() === $this->getId()) {
                        $entity->teleport($block->asVector3());
                        break;
                    }
                }
            }
        }
    }

    public function hasEntityCollision(): bool
    {
        return true;
    }
}