<?php

/**
 * MultiWorld - PocketMine plugin that manages worlds.
 * Copyright (C) 2018 - 2023  CzechPMDevs
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

namespace czechpmdevs\multiworld\generator\skyblock\populator;

use pocketmine\block\VanillaBlocks;
use pocketmine\math\Vector3;
use pocketmine\utils\Random;
use pocketmine\world\ChunkManager;
use pocketmine\world\generator\object\OakTree;
use pocketmine\world\generator\populator\Populator;

class Island implements Populator {

	public function populate(ChunkManager $world, int $chunkX, int $chunkZ, Random $random): void {
		$center = new Vector3(256, 68, 256);

		for($x = -1; $x <= 1; $x++) {
			for($y = -1; $y <= 1; $y++) {
				for($z = -1; $z <= 1; $z++) {
					// center
					$centerVec = $center->add($x, $y, $z);
					$world->setBlockAt($centerVec->getFloorX(), $centerVec->getFloorY(), $centerVec->getFloorZ(), $centerVec->getY() === 69.0 ? VanillaBlocks::GRASS() : VanillaBlocks::DIRT());

					// left
					$leftVec = $center->add(3, 0, 0)->add($x, $y, $z);
					$world->setBlockAt($leftVec->getFloorX(), $leftVec->getFloorY(), $leftVec->getFloorZ(), $leftVec->getY() === 69.0 ? VanillaBlocks::GRASS() : VanillaBlocks::DIRT());

					// down
					$downVec = $center->subtract(0, 0, 3)->add($x, $y, $z);
					$world->setBlockAt($downVec->getFloorX(), $downVec->getFloorY(), $downVec->getFloorZ(), $leftVec->getY() === 69.0 ? VanillaBlocks::GRASS() : VanillaBlocks::DIRT());
				}
			}
		}

		// chest
		$chestVec = $center->add(0, 2, -4);
		$world->setBlockAt($chestVec->getFloorX(), $chestVec->getFloorY(), $chestVec->getFloorZ(), VanillaBlocks::CHEST());

		// tree
		$treeVec = $center->add(4, 2, 1);
		$tree = new OakTree;
		$tree->getBlockTransaction($world, $treeVec->getFloorX(), $treeVec->getFloorY(), $treeVec->getFloorZ(), $random)?->apply();

		// bedrock
		$world->setBlockAt($center->getFloorX(), $center->getFloorY(), $center->getFloorZ(), VanillaBlocks::BEDROCK());
	}
}