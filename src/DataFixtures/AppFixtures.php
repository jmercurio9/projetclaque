<?php

namespace App\DataFixtures;

use App\Entity\Country;
use App\Entity\Mobility;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for ($i = 0; $i < 20; $i++) {
            $country = new Country();
            $country->setName('country '.$i);
            $manager->persist($country);


            $user = new User();
            $user -> setUsername('username'.$i);
            $user -> setEmail('email'.$i);
            $user -> setFirstName('firtName'.$i);
            $user -> setLastName('lastName'.$i);
            $user -> setPassword('password'.$i);
            $user -> setPromo(1);
            $user -> setRoles(array(2));

            $manager->persist($user);

            $mobility = new Mobility();
            $mobility-> setTitle('mobility'.$i);
            $mobility-> setAuthor($user);
            $mobility-> setCity('city'.$i);
            $mobility-> setCountry($country);
            $mobility-> setDesription('description'.$i);
            $mobility-> setFinishedOn(date_create_from_format(DATE_ATOM,mktime(0,0,0,2,7,2022)));
            $mobility-> setStartedOn(date_create_from_format(DATE_ATOM,mktime(0, 0, 0,7,7,2022)));

            $manager-> persist($mobility);



        }
        $manager->flush();
    }
}


