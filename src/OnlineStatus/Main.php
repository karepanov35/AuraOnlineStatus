<?php
declare(strict_types=1);

namespace OnlineStatus;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\server\QueryRegenerateEvent;
use OnlineStatus\manager\ConfigManager;
use OnlineStatus\manager\OnlineManager;

class Main extends PluginBase implements Listener {

    private ConfigManager $configManager;
    private OnlineManager $onlineManager;

    public function onEnable(): void {
        $this->configManager = new ConfigManager($this);
        $this->onlineManager = new OnlineManager($this, $this->configManager);
        
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->onlineManager->startUpdateTask();
        
        $this->getLogger()->info("§fПлагин §aуспешно §fзапущен! Отслеживаем сервер: §6" . 
            $this->configManager->getRemoteAddress());
    }

    public function onQueryRegenerate(QueryRegenerateEvent $event): void {
        $event->getQueryInfo()->setPlayerCount(
            $this->onlineManager->getTotalOnline()
        );
    }
}