<?php
class ArmaObject {
	
	var $idx =  '';
	var $className =  '';
	var $generalMacro =  '';
	var $vehicleClass =  '';
	var $displayName =  '';
	var $availableForSupportTypes =  '';
	var $weapons =  '';
	var $magazines =  '';
	var $textSingular =  '';
	var $filter =  '';
	var $side =  '';
	var $model =  '';
	var $parent =  '';
	var $ttl =  '';
	var $mod =  '';
	var $parents =  '';
	var $faction =  '';
	var $crew =  '';
	var $picture =  '';
	var $icon =  '';
	var $slingLoadCargoMemoryPoints =  '';
	var $crewCrashProtection =  '';
	var $crewExplosionProtection =  '';
	var $numberPhysicalWheels =  '';
	var $tracksSpeed =  '';
	var $CommanderOptics =  '';
	var $maxGForce =  '';
	var $fireResistance =  '';
	var $airCapacity =  '';
	var $tf_hasLRradio =  '';
	var $author =  '';
	var $cargoIsCoDriver =  '';
	var $transportSoldier =  '';
	var $transportVehicleCount =  '';
	var $transportAmmo =  '';
	var $transportFuel =  '';
	var $transportRepair =  '';
	var $maximumLoad =  '';
	var $transportMaxWeapons =  '';
	var $transportMaxMagazines =  '';
	var $transportMaxBackpacks =  '';
	var $fuelCapacity =  '';
	var $armor =  '';
	var $audible =  '';
	var $accuracy =  '';
	var $camouflage =  '';
	var $accerleration =  '';
	var $brakeDistance =  '';
	var $maxSpeed =  '';
	var $minSpeed =  '';
	var $hiddenSelections =  '';
	var $hiddenSelectionsTextures =  '';
	var $armorStructural =  '';
	var $armorFuel =  '';
	var $armorGlass =  '';
	var $armorLights =  '';
	var $armorWheels =  '';
	var $armorHull =  '';
	var $armorTurret =  '';
	var $armorGun =  '';
	var $armorEngine =  '';
	var $armorTracks =  '';
	var $armorHead =  '';
	var $armorHands =  '';
	var $armorLegs =  '';
	var $armorAvionics =  '';
	var $armorVRotor =  '';
	var $armorHRotor =  '';
	var $armorMissiles =  '';
	var $modelSizes =  '';
	var $worldSizes =  '';
	var $radius =  '';
	var $boundingBox =  '';
	var $parentClassHirachical =  '';
	var $logContainsErrors =  '';
	var $log =  '';
	var $createable =  '';
	
	function display() {
		printf(htmlspecialchars($this->className));
	}
	
	/*
	function __construct($objData) {
		foreach($objData as $key=>$value) {
			switch ($key) {
				case "className":
					$this->className = $value;
					break;
				case "displayName":
					$this->displayName = $value;
					break;
					
				case "idx":
					$this->idx   = $value;
					break;
				case "className":
					$this->className   = $value;
					break;
				case "generalMacro":
					$this->generalMacro   = $value;
					break;
				case "vehicleClass":
					$this->vehicleClass   = $value;
					break;
				case "displayName":
					$this->displayName   = $value;
					break;
				case "availableForSupportTypes":
					$this->availableForSupportTypes   = $value;
					break;
				case "weapons":
					$this->weapons   = $value;
					break;
				case "magazines":
					$this->magazines   = $value;
					break;
				case "textSingular":
					$this->textSingular   = $value;
					break;
				case "filter":
					$this->filter   = $value;
					break;
				case "side":
					$this->side   = $value;
					break;
				case "model":
					$this->model   = $value;
					break;
				case "parent":
					$this->parent   = $value;
					break;
				case "ttl":
					$this->ttl   = $value;
					break;
				case "mod":
					$this->mod   = $value;
					break;
				case "parents":
					$this->parents   = $value;
					break;
				case "faction":
					$this->faction   = $value;
					break;
				case "crew":
					$this->crew   = $value;
					break;
				case "picture":
					$this->picture   = $value;
					break;
				case "icon":
					$this->icon   = $value;
					break;
				case "slingLoadCargoMemoryPoints":
					$this->slingLoadCargoMemoryPoints   = $value;
					break;
				case "crewCrashProtection":
					$this->crewCrashProtection   = $value;
					break;
				case "crewExplosionProtection":
					$this->crewExplosionProtection   = $value;
					break;
				case "numberPhysicalWheels":
					$this->numberPhysicalWheels   = $value;
					break;
				case "tracksSpeed":
					$this->tracksSpeed   = $value;
					break;
				case "CommanderOptics":
					$this->CommanderOptics   = $value;
					break;
				case "maxGForce":
					$this->maxGForce   = $value;
					break;
				case "fireResistance":
					$this->fireResistance   = $value;
					break;
				case "airCapacity":
					$this->airCapacity   = $value;
					break;
				case "tf_hasLRradio":
					$this->tf_hasLRradio   = $value;
					break;
				case "author":
					$this->author   = $value;
					break;
				case "cargoIsCoDriver":
					$this->cargoIsCoDriver   = $value;
					break;
				case "transportSoldier":
					$this->transportSoldier   = $value;
					break;
				case "transportVehicleCount":
					$this->transportVehicleCount   = $value;
					break;
				case "transportAmmo":
					$this->transportAmmo   = $value;
					break;
				case "transportFuel":
					$this->transportFuel   = $value;
					break;
				case "transportRepair":
					$this->transportRepair   = $value;
					break;
				case "maximumLoad":
					$this->maximumLoad   = $value;
					break;
				case "transportMaxWeapons":
					$this->transportMaxWeapons   = $value;
					break;
				case "transportMaxMagazines":
					$this->transportMaxMagazines   = $value;
					break;
				case "transportMaxBackpacks":
					$this->transportMaxBackpacks   = $value;
					break;
				case "fuelCapacity":
					$this->fuelCapacity   = $value;
					break;
				case "armor":
					$this->armor   = $value;
					break;
				case "audible":
					$this->audible   = $value;
					break;
				case "accuracy":
					$this->accuracy   = $value;
					break;
				case "camouflage":
					$this->camouflage   = $value;
					break;
				case "accerleration":
					$this->accerleration   = $value;
					break;
				case "brakeDistance":
					$this->brakeDistance   = $value;
					break;
				case "maxSpeed":
					$this->maxSpeed   = $value;
					break;
				case "minSpeed":
					$this->minSpeed   = $value;
					break;
				case "hiddenSelections":
					$this->hiddenSelections   = $value;
					break;
				case "hiddenSelectionsTextures":
					$this->hiddenSelectionsTextures   = $value;
					break;
				case "armorStructural":
					$this->armorStructural   = $value;
					break;
				case "armorFuel":
					$this->armorFuel   = $value;
					break;
				case "armorGlass":
					$this->armorGlass   = $value;
					break;
				case "armorLights":
					$this->armorLights   = $value;
					break;
				case "armorWheels":
					$this->armorWheels   = $value;
					break;
				case "armorHull":
					$this->armorHull   = $value;
					break;
				case "armorTurret":
					$this->armorTurret   = $value;
					break;
				case "armorGun":
					$this->armorGun   = $value;
					break;
				case "armorEngine":
					$this->armorEngine   = $value;
					break;
				case "armorTracks":
					$this->armorTracks   = $value;
					break;
				case "armorHead":
					$this->armorHead   = $value;
					break;
				case "armorHands":
					$this->armorHands  = $value;
					break;
				case "armorLegs":
					$this->armorLegs   = $value;
					break;
				case "armorAvionics":
					$this->armorAvionics   = $value;
					break;
				case "armorVRotor":
					$this->armorVRotor   = $value;
					break;
				case "armorHRotor":
					$this->armorHRotor   = $value;
					break;
				case "armorMissiles":
					$this->armorMissiles   = $value;
					break;
				case "modelSizes":
					$this->modelSizes   = $value;
					break;
				case "worldSizes":
					$this->worldSizes   = $value;
					break;
				case "radius":
					$this->radius   = $value;
					break;
				case "boundingBox":
					$this->boundingBox   = $value;
					break;
				case "parentClassHirachical":
					$this->parentClassHirachical   = $value;
					break;
				case "logContainsErrors":
					$this->logContainsErrors   = $value;
					break;
				case "log":
					$this->log   = $value;
					break;
				case "createable":
					$this->createable   = $value;
					break;			
				default:
					break;
			}
		}	
		//console('loading:' . $this->idx . ' - ' . $this->className, 1, $GLOBALS["debug"]);
	}*/
}

?>