<?php
declare(strict_types=1);

namespace OnlineStatus\manager;

use pocketmine\Server;
use OnlineStatus\task\RemotePingTask;

class OnlineManager {
    
    private static int $remoteOnline = 0;
    private ConfigManager $config;
    
    public function __construct(
        private \pocketmine\plugin\PluginBase $plugin,
        ConfigManager $config
    ) {
        $this->config = $config;
    }
    
    public function startUpdateTask(): void {
        $this->plugin->getScheduler()->scheduleRepeatingTask(
            new class($this) extends \pocketmine\scheduler\Task {
                public function __construct(private OnlineManager $manager) {}
                
                public function onRun(): void {
                    $this->manager->updateRemoteOnline();
                }
            },
            20 * $this->config->getUpdateInterval()
        );
    }
    
    public function updateRemoteOnline(): void {
        Server::getInstance()->getAsyncPool()->submitTask(
            new RemotePingTask(
                $this->config->getRemoteIp(),
                $this->config->getRemotePort()
            )
        );
    }
    
    public static function setRemoteOnline(int $online): void {
        self::$remoteOnline = $online;
        Server::getInstance()->getLogger()->debug("Обновлен онлайн удаленного сервера: " . $online);
    }
    
    public function getTotalOnline(): int {
        $local = count(Server::getInstance()->getOnlinePlayers());
        $total = $local + self::$remoteOnline;
        
        Server::getInstance()->getLogger()->debug(
            "Текущий онлайн: Локально - $local, Удаленно - " . self::$remoteOnline . ", Всего - $total"
        );
        
        return $total;
    }
}