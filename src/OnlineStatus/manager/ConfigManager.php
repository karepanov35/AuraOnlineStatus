<?php
declare(strict_types=1);

namespace OnlineStatus\manager;

use pocketmine\utils\Config;

class ConfigManager {
    
    private string $remoteIp;
    private int $remotePort;
    private int $updateInterval;
    
    public function __construct(private \pocketmine\plugin\PluginBase $plugin) {
        $this->initConfig();
    }
    
    private function initConfig(): void {
        $this->plugin->saveResource("config.yml");
        $config = new Config($this->plugin->getDataFolder() . "config.yml", Config::YAML, [
            "remote-ip" => "45.93.200.234",
            "remote-port" => 19138,
            "update-interval" => 30
        ]);
        
        $this->remoteIp = $config->get("remote-ip");
        $this->remotePort = $config->get("remote-port");
        $this->updateInterval = $config->get("update-interval");
    }
    
    public function getRemoteAddress(): string {
        return $this->remoteIp . ":" . $this->remotePort;
    }
    
    public function getRemoteIp(): string {
        return $this->remoteIp;
    }
    
    public function getRemotePort(): int {
        return $this->remotePort;
    }
    
    public function getUpdateInterval(): int {
        return $this->updateInterval;
    }
}