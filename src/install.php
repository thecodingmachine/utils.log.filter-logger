<?php
// First, let's request the install utilities
use Mouf\Actions\InstallUtils;
use Mouf\MoufManager;

// Let's init Mouf
InstallUtils::init(InstallUtils::$INIT_APP);

// Let's create the instance
$moufManager = MoufManager::getMoufManager();

if (!$moufManager->instanceExists("enhanceCategoryLogFilter")) {
	$moufManager->declareComponent("enhanceCategoryLogFilter", "Mouf\\Utils\\Log\\FilterLogger\\EnhanceCategoryLogFilter");
	$moufManager->setParameter("enhanceCategoryLogFilter", "useCategory", "category1");
	$moufManager->setParameter("enhanceCategoryLogFilter", "splitPosition", "30");
}

// Let's rewrite the MoufComponents.php file to save the component
$moufManager->rewriteMouf();

// Finally, let's continue the install
InstallUtils::continueInstall();
?>