<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Agent;
use App\Entity\Cible;
use App\Entity\Contact;
use App\Entity\Mission;
use App\Entity\Planque;
use App\Entity\Specialite;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        ///Creation de 30 Missions

        $faker = Factory::create('fr_FR');

        for ($m = 0; $m < 30; $m++) {
        $mission = new Mission();
        $mission->setTitremission($faker->jobTitle);
        $mission->setDescriptionMission($faker->text);
        $mission->setNomcode($faker->word);
        $mission->setPays($faker->country);
        $mission->setTypemission('Surveillance');
        $mission->setStatutmission('En Preparation');
        $mission->setSpecialiteRequise($faker->jobTitle);
       
        $manager->persist($mission);


        $mission2 = new Mission();
        $mission2->setTitremission($faker->jobTitle);
        $mission2->setDescriptionMission($faker->text);
        $mission2->setNomcode($faker->word);
        $mission2->setPays($faker->country);
        $mission2->setTypemission('Assassinat');
        $mission2->setStatutmission('En cours');
        $mission2->setSpecialiteRequise($faker->jobTitle);

        $manager->persist($mission2);


        $mission3 = new Mission();
        $mission3->setTitremission($faker->jobTitle);
        $mission3->setDescriptionMission($faker->text);
        $mission3->setNomcode($faker->word);
        $mission3->setPays($faker->country);
        $mission3->setTypemission('Infiltration');
        $mission3->setStatutmission('Termine');
        $mission3->setSpecialiteRequise($faker->jobTitle);
        
        $manager->persist($mission3);


         
        $mission4 = new Mission();
        $mission4->setTitremission($faker->jobTitle);
        $mission4->setDescriptionMission($faker->text);
        $mission4->setNomcode($faker->word);
        $mission4->setPays($faker->country);
        $mission4->setTypemission('masson');
        $mission4->setStatutmission('En echec');
        $mission4->setSpecialiteRequise($faker->jobTitle);

        $manager->persist($mission4);

 }


        //create 30 agents! 

        $faker = Factory::create('fr_FR');

        for ($a = 0; $a < 30; $a++) {
      
        $agent = new Agent();
        $agent->setNom($faker->lastname);
        $agent->setPrenom($faker->firstname);
        $agent->setCodeIdentification($faker->vat);
        $agent->setNationalite($faker->region);
        $agent->setMission($mission);
        $manager->persist($agent);

       
       }

       //create 30 cibles! 

       $faker = Factory::create('fr_FR');

       for ($c = 0; $c < 30; $c++) {

         $cible = new Cible();
         $cible->setnom($faker->lastname);
         $cible->setPrenom($faker->firstname);
         $cible->setNomCode($faker->companySuffix);
         $cible->setNationalite($faker->region);
         $cible->setMission($mission);

         $manager->persist($cible);

       }


        //create 30 contacts! 

        $faker = Factory::create('fr_FR');

        for ($c = 0; $c < 30; $c++) {

         $contact = new Contact();
         $contact->setNom($faker->lastname);
         $contact->setPrenom($faker->firstname);
         $contact->setNomcode($faker->word);
         $contact->setNationalite($faker->region);
         $contact->setMission($mission);
         $manager->persist($contact);
         
        
       }


        //create 30 planque! 

        $faker = Factory::create('fr_FR');

        for ($p = 0; $p < 30; $p++) {

         $planque = new Planque();
         $planque->setCodePlanque($faker->vat);
         $planque->setAdresse($faker->address);
         $planque->setPays($faker->country);
         $planque->setTypePlanque($faker->word);
        
        
       

         $manager->persist($planque);
        }


        $faker = Factory::create('fr_FR');

        for ($c = 0; $c < 30; $c++) {

         $specialite = new Specialite();
         $specialite->setSpecialite($faker->JobTitle);
         $specialite->setDescription($faker->text);
         $specialite->setAgent($agent);

         $manager->persist($specialite);
    
        }

        $manager->flush();
        
       
    }
}



