<?php

namespace Troll;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat as C;
use pocketmine\Player;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\Item;

class Main extends PluginBase implements Listener
{

    public $prefix = C::WHITE . "[" . C::AQUA . "Troll" . C::WHITE . "] ";

    public function onEnable()
    {
        $this->getLogger()->info($this->prefix . "Wurde geladen");
    }

    public function vitems(Player $player)
    {
        $player->getInventory()->clearAll();
        $player->getInventory()->setItem(0, Item::get(341)->setCustomName(C::BOLD.C::GREEN."Vanish on"));
        $player->getInventory()->setItem(8, Item::get(341)->setCustomName(C::BOLD.C::RED."Vanish off"));
    }

    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args)
    {
        $name = $sender->getName();
        switch ($cmd->getName()) {
            case "Vanish":
                $this->vitems($sender);
                $sender->sendMessage($this->prefix."Du hast die Vanish Items erhalten");
                return true;
        }
    }

    public function onInteract(PlayerInteractEvent $event)
    {
        $player = $event->getPlayer();
        $name = $player->getName();
        $item = $player->getInventory()->getItemInHand();

        if($item->getName() == C::BOLD.C::GREEN."Vanish on");
        {
            $player->sendMessage($this->prefix."Du bist nun im Vanish");
        }
    }

}