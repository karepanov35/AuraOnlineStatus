#AuraOnlineStatus

🇺🇳 English

Overview
AuraOnlineStatus is a plugin for Minecraft Bedrock Edition servers running PocketMine-MP 5.0.0 (PM5 API 5.0.0). This plugin allows server administrators to display the online player count of a remote server in the lobby or sum the total online players across multiple servers. It provides real-time server status updates, enhancing the player experience with clear and customizable online status displays.

Features
Displays the online player count for a specified remote server in the lobby.
Supports summing the total online players across multiple servers.
Compatible with PocketMine-MP 5.0.0 (PM5 API 5.0.0).
Lightweight and optimized for minimal server load.
Easy configuration for single or multi-server setups.

Installation
Download the latest release of AuraOnlineStatus from the Releases page.
Place the AuraOnlineStatus.phar file in the plugins folder of your PocketMine-MP server.
Restart the server or use the /reload command to load the plugin.
Configure the plugin settings in the config.yml file located in the plugin_data/AuraOnlineStatus folder.

Configuration
The plugin generates a config.yml file upon first run. You can customize the following settings:

remote-ip: The IP address of the server to monitor for online player counts.
remote-port: The port of the server to monitor.
update-interval: Frequency (in seconds) for updating the online status.

Example config.yml:
remote-ip: "45.93.200.234"
remote-port: 19138
update-interval: 30


🇷🇺 Русский

Обзор
AuraOnlineStatus — это плагин для серверов Minecraft Bedrock Edition, работающих на PocketMine-MP 5.0.0 (PM5 API 5.0.0). Плагин позволяет администраторам серверов отображать количество игроков онлайн на удалённом сервере в лобби или суммировать общее количество игроков онлайн на нескольких серверах. Он предоставляет актуальную информацию о статусе серверов в удобном и настраиваемом формате.

Возможности
Отображение количества игроков онлайн для указанного удалённого сервера в лобби.
Поддержка суммирования общего количества игроков онлайн на нескольких серверах.
Совместимость с PocketMine-MP 5.0.0 (PM5 API 5.0.0).
Легковесный и оптимизированный для минимальной нагрузки на сервер.
Простая настройка для одиночных или многосерверных конфигураций.

Установка
Скачайте последнюю версию AuraOnlineStatus с Releases.
Поместите файл AuraOnlineStatus.phar в папку plugins вашего сервера PocketMine-MP.
Перезапустите сервер или используйте команду /reload для загрузки плагина.
Настройте параметры плагина в файле config.yml, который находится в папке plugin_data/AuraOnlineStatus.

Настройка
При первом запуске плагин создаёт файл config.yml. Вы можете настроить следующие параметры:

remote-ip: IP-адрес сервера для мониторинга количества игроков онлайн.
remote-port: Порт сервера для мониторинга.
update-interval: Частота обновления статуса онлайна (в секундах).

Пример config.yml:
remote-ip: "45.93.200.234"
remote-port: 19138
update-interval: 30
