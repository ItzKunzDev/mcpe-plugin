<?php

namespace SkyBlockUI;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class Main extends PluginBase 
{

	public function onEnable()
	{

	}

	public function onCommand(CommandSender $sender, Command $cmd, String $label, Array $args) : bool
	{

		switch($cmd->getName())
		{
			case "sbui"
			 if($sender instanceof Player)
			 {
			 	$this->ui($sender);
			 }
		}
	return true;
	}

	public function ui($player)
	{
		$form = this->getServer()->getPluginManager()->getPlugin("FormAPI")->createSimpleForm(function (Player $player, int $data = null)
			{
			if($data === null)
			{
				return true;
			}
			switch($data)
			{
				case 0:
					$this->getServer()->dispatchCommand($player, "is create");
				break;

				case 1:
					$this->getServer()->dispatchCommand($player, "is join");
				break;

				case 2:
					$this->getServer()->dispatchCommand($player, "is lock");
				break;

				case 3:
					$this->visit($player);
				break;

				case 4:
					$this->getServer()->dispatchCommand($player, "is leave");
				break;

				case 5:
					$this->getServer()->dispatchCommand($player, "is disband");
				break;

				case 6:
					$this->kick($player);
				break;

				case 7:
					$this->promote($player);
				break;

				case 8:
					$this->getServer()->dispatchCommand($player, "is setspawn");
				break;

				case 9:
					$this->add($player);
				break;

			}
		});
		$form->setTitle("SkyBlockUI");
		$form->setContent("Pilih Menu Dibawah Ini!");
		$form->addButton("Buat Island");
		$form->addButton("Kembali Ke Island");
		$form->addButton("Buka/Kunci Island");
		$form->addButton("Pergi Ke Island Orang");
		$form->addButton("Tinggalkan Island Mu");
		$form->addButton("Hapus Island");
		$form->addButton("Kick Teman Setim Dari Island");
		$form->addButton("Promote Teman Setim Di Island Mu");
		$form->addButton("Setspawn Island");
		$form->addButton("Tambahkan Temanmu Untuk Bergabung Ke Island");
		$form->sendToPlayer($player);
		return $form;
	}

	public function visit($player)
	{
		$form = this->getServer()->getPluginManager()->getPlugin("FormAPI")->createCustomForm(function (Player $player, int $data = null)
			{
			if($data === null)
			{
				return true;
			}
			$this->getServer()->dispatchCommand($player, "is visit" . $data[0]);
		});
		$form->setTitle("SkyBlockUI");
		$form->addInput("Ketik Nama Player Yang Akan Kamu Datangi!")
		$form->setContent("Pilih Menu Dibawah Ini!");
		$form->sendToPlayer($player);
		return $form;
		
	}

public function kick($player)
	{
		$form = this->getServer()->getPluginManager()->getPlugin("FormAPI")->createCustomForm(function (Player $player, int $data = null)
			{
			if($data === null)
			{
				return true;
			}
			$this->getServer()->dispatchCommand($player, "is fire" . $data[0]);
		});
		$form->setTitle("SkyBlockUI");
		$form->addInput("Ketik Nama Player Yang Akan Kamu Kick!")
		$form->setContent("Pilih Menu Dibawah Ini!");
		$form->sendToPlayer($player);
		return $form;
	
	}

public function promote($player)
	{
		$form = this->getServer()->getPluginManager()->getPlugin("FormAPI")->createCustomForm(function (Player $player, int $data = null)
			{
			if($data === null)
			{
				return true;
			}
			$this->getServer()->dispatchCommand($player, "is promote" . $data[0]);
		});
		$form->setTitle("SkyBlockUI");
		$form->addInput("Ketik Nama Player Yang Akan Kamu Promote!")
		$form->setContent("Pilih Menu Dibawah Ini!");
		$form->sendToPlayer($player);
		return $form;
	}
	
public function add($player)
	{
		$form = this->getServer()->getPluginManager()->getPlugin("FormAPI")->createCustomForm(function (Player $player, int $data = null){
			{
			if($data === null)
			{
				return true;
			}
			$this->getServer()->dispatchCommand($player, "is cooperate" . $data[0]);
		});
		$form->setTitle("SkyBlockUI");
		$form->addInput("Ketik Nama Player Yang Akan Kamu Tambah!")
		$form->setContent("Pilih Menu Dibawah Ini!");
		$form->sendToPlayer($player);
		return $form;
	}

}