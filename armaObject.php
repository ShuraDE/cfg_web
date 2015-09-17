<?php
class ArmaObject {
	
	private $idx;
	private $className;
	private $generalMacro;
	private $vehicleClass;
	private $displayName;
	private $availableForSupportTypes;
	private $weapons;
	private $magazines;
	private $textSingular;
	private $filter;
	private $side;
	private $model;
	private $parent;
	private $ttl;
	private $mod;
	private $parents;
	private $faction;
	private $crew;
	private $picture;
	private $icon;
	private $slingLoadCargoMemoryPoints;
	private $crewCrashProtection;
	private $crewExplosionProtection;
	private $numberPhysicalWheels;
	private $tracksSpeed;
	private $CommanderOptics;
	private $maxGForce;
	private $fireResistance;
	private $airCapacity;
	private $tf_hasLRradio;
	private $author;
	private $cargoIsCoDriver;
	private $transportSoldier;
	private $transportVehicleCount;
	private $transportAmmo;
	private $transportFuel;
	private $transportRepair;
	private $maximumLoad;
	private $transportMaxWeapons;
	private $transportMaxMagazines;
	private $transportMaxBackpacks;
	private $fuelCapacity;
	private $armor;
	private $audible;
	private $accuracy;
	private $camouflage;
	private $accerleration;
	private $brakeDistance;
	private $maxSpeed;
	private $minSpeed;
	private $hiddenSelections;
	private $hiddenSelectionsTextures;
	private $armorStructural;
	private $armorFuel;
	private $armorGlass;
	private $armorLights;
	private $armorWheels;
	private $armorHull;
	private $armorTurret;
	private $armorGun;
	private $armorEngine;
	private $armorTracks;
	private $armorHead;
	private $armorHands;
	private $armorLegs;
	private $armorAvionics;
	private $armorVRotor;
	private $armorHRotor;
	private $armorMissiles;
	private $modelSizes;
	private $worldSizes;
	private $radius;
	private $boundingBox;
	private $parentClassHirachical;
	private $logContainsErrors;
	private $log;
	private $createable;
	
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
		console('loading:' . $this->idx . ' - ' . $this->className, 1, $GLOBALS["debug"]);
	}
}

?>