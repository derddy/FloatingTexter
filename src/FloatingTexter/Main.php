<?php

namespace FloatingTexter;

use pocketmine\event\entity\EntityLevelChangeEvent;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\level\particle\FloatingTextParticle;
use pocketmine\math\Vector3;

class Main extends PluginBase implements Listener{

	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info("Enabled!");
		if(!is_dir($this->getDataFolder())) mkdir($this->getDataFolder());
		if(!file_exists($this->getDataFolder() . "config.yml")){
			$this->getConfig()->setDefaults(array(
				"test" => [
					"x" => 0,
					"y" => 128,
					"z" => 0,
					"level" => "world",
					"text" => "Welcome to the server! :)"
				]
			));
			$this->getConfig()->save();
			$this->updateTexts();
		}
	}

	public function onDisable(){
		$this->getLogger()->info("Disabled");
	}

	public function updateTexts(){
		foreach($this->getConfig()->getAll() as $name => $values){
			foreach($this->getServer()->getLevels() as $level){
				if($level->getName() == $values["level"]){
					$level->addParticle(new FloatingTextParticle(new Vector3($values["x"], $values["y"], $values["z"]), "", $values["text"]));
				}
			}
		}
	}

	public function join(PlayerJoinEvent $ev){
		$this->updateTexts();
	}

	public function levelChange(EntityLevelChangeEvent $ev){
		if($ev->getEntity() instanceof Player){
			$this->updateTexts();
		}
	}

}