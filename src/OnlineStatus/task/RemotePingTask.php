<?php
declare(strict_types=1);

namespace OnlineStatus\task;

use pocketmine\scheduler\AsyncTask;
use raklib\protocol\UnconnectedPing;
use raklib\protocol\PacketSerializer;
use OnlineStatus\manager\OnlineManager;

class RemotePingTask extends AsyncTask {
    
    public function __construct(
        private string $ip,
        private int $port
    ) {}
    
    public function onRun(): void {
        $socket = @fsockopen("udp://{$this->ip}", $this->port, $errno, $errstr, 2);
        if (!$socket) {
            $this->setResult(0);
            return;
        }
        
        stream_set_timeout($socket, 2);
        
        $ping = new UnconnectedPing();
        $ping->sendPingTime = \PHP_INT_MAX;
        $ping->clientId = 0;
        
        $serializer = new PacketSerializer();
        $ping->encode($serializer);
        
        fwrite($socket, $serializer->getBuffer());
        $response = fread($socket, 4096);
        fclose($socket);
        
        $this->setResult(
            ($response !== false && isset($response[35])) 
            ? (int)explode(";", substr($response, 35))[4] 
            : 0
        );
    }
    
    public function onCompletion(): void {
        OnlineManager::setRemoteOnline($this->getResult());
    }
}