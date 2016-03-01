<?php

namespace SHE;


use pocketmine\event\entity\EntityDamageByEntityEvent; /*
The only real needed event, but I'll be adding more.. maybe 'not making any promises'
*/


use pocketmine\event\Listener;


use pocketmine\plugin\PluginBase;


use pocketmine\utils\TextFormat as Color; /* Learend from Txanner 'as Color'
*/


use pocketmine\level\particle\ExplodeParticle;


use pocketmine\level\particle\FloatingTextParticle; /*
This should be cool
*/



class SpecialHitEvents extends PluginBase implements Listener {

    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    
    /*$this->event = $event;
    $this->entity = $entity;
    $this->entity = null;*/
            public function onDamage(EntityDamageEvent $event){
            $entity = $event->getEntity();
		$entity->getLevel()->addParticle(new ExplodeParticle($entity->add(0.1 * mt_rand(1, 9) * mt_rand(-1, 1), 0.1 * mt_rand(5, 9), 0.1 * mt_rand(1,9) * mt_rand(-1, 1)), Color::YELLOW . "SMACK"));
		$entity->getLevel()->addParticle(new DustParticle($entity->add(mt_rand(-3, 3), mt_rand(-3, 3), mt_rand(-3, 3)), 211, 161, 80, 255));
	}

	public function onDisable(){
        $this->getLogger()->info("SpecialHitEvents has been successfully Disabled!");
        return true;
    }
}
