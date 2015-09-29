<?php

class ArmaObjectParent {
	var $tier = '';
	var $entry = '';	
}

class ArmaObjectLog {
	var $string =  '';
}

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
	var $parents =  array();
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
	var $log =  array();
	var $createable =  '';
	
	function display() {
		printf(htmlspecialchars($this->className));
	}
	
	//todo
	//db operations
}

?>