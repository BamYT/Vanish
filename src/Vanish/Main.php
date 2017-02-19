<?php

namespace Vanish;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\entity\Item;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as C;

class Main extends PluginBase implements Listener
{

    public $prefix = C::WHITE."[".C::AQUA."Vanish".C::WHITE."] ";


    public function onEnable()
    {
        $this->getLogger()->info($this->prefix."wurde geladen");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function VItmens(Player $player)
    {
        $player->getInventory()->setItem(0, Item::get(377)->setCustomName(C::BOLD.C::GREEN."Vanish on"));
        $player->getInventory()->setItem(1, Item::get(377)->setCustomName(C::BOLD.C::RED."Vanish off"));
    }

    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args)
    {
        $name = $sender->getName();
        switch ($cmd->getName()) {
            case "Vanish":
                if($sender instanceof Player) {

                    $this->VItmens($sender);
                    $sender->sendMessage($this->prefix.C::RED."Vanish Items wurden hinzugefügt");
                }
        }

    }
}