<?php

namespace App\DataFixtures;

use App\Entity\Destination;
use App\Entity\Driver;
use App\Entity\Location;
use App\Entity\Owner;
use App\Entity\Terminal;
use App\Entity\Transport;
use App\Entity\Trip;
use App\Entity\TripWay;
use App\Entity\User;
use App\Entity\Type\TransportType;
use App\Entity\Waybill;
use App\Entity\Wayorder;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Cocur\Slugify\SlugifyInterface;

class AppFixtures extends Fixture
{

    private $faker;
    private $slug;

    public function __construct(SlugifyInterface $slugify)
    {
        $this->faker = Factory::create();
        $this->slug = $slugify;
    }

    public function loadUser(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('admin');
        $user->setEmail('admin@mail.com');
        $user->setEnabled(true);
        $user->setPlainPassword('12345');
        $user->setRoles(array('ROLE_ADMIN', 'ROLE_OPERATOR'));
        $manager->persist($user);
        $manager->flush();
    }

    public function loadData(ObjectManager $manager)
    {

        $make_records = 20;

        for($i = 1; $i < $make_records; $i++){
            $entity = new Driver();
            $entity->setName($this->faker->name());
            $manager->persist($entity);
        }
        $manager->flush();
        for($i = 1; $i < $make_records; $i++){
            $entity = new Destination();
            $entity->setTitle('Destination ' . $i);
            $manager->persist($entity);
        }
        $manager->flush();
        for($i = 1; $i < $make_records; $i++){
            $entity = new Location();
            $entity->setTitle('Location ' . $i);
            $manager->persist($entity);
        }
        $manager->flush();
        for($i = 1; $i < $make_records; $i++){
            $entity = new Owner();
            $entity->setName('Owner ' . $i);
            $manager->persist($entity);
        }
        $manager->flush();
        for($i = 1; $i < $make_records; $i++){
            $entity = new Terminal();
            $entity->setTitle('Terminal ' . $i)
                ->setDiagramaProcente(10);
            $manager->persist($entity);
        }
        $manager->flush();
        for($i = 1; $i < $make_records; $i++){
            $entity = new Transport();
            $entity->setTitle('Transport ' . $i)
                ->setType(array_rand(array_flip(TransportType::getChoices())))
                ->setOwner($this->loadReference($manager, Owner::class));
            $manager->persist($entity);
        }
        $manager->flush();
        for($i = 1; $i < $make_records; $i++){
            $entity = new Trip();
            $entity->setTransportType(array_rand(array_flip(TransportType::getChoices())))
                ->setDays([1,2,3])
                ->setLocation($this->loadReference($manager, Location::class))
                ->setTerminal($this->loadReference($manager, Terminal::class))
                ->setDestination($this->loadReference($manager, Destination::class))
                ->setPlan(200)
                ->setMotorina(20)
                ->setHourStart(\DateTime::createFromFormat("H:i", "8:00"))
                ->setHourEnd(\DateTime::createFromFormat("H:i", "18:00"));
            $manager->persist($entity);
        }
        $manager->flush();
        for($i = 1; $i < $make_records; $i++){
            $entity = new TripWay();
            $entity->setTransportType(array_rand(array_flip(TransportType::getChoices())))
                ->setLocation($this->loadReference($manager, Location::class))
                ->setTerminal($this->loadReference($manager, Terminal::class))
                ->setDestination($this->loadReference($manager, Destination::class))
                ->setOreLucru(\DateTime::createFromFormat("H:i", "8:00"))
                ->setMotorina(20)
                ->setDistanta(100)
                ->setVenit(400);
            $manager->persist($entity);
        }
        for($i = 1; $i < $make_records; $i++){
            $entity = new Waybill();
            $entity->setSeria("AA")
                ->setNumarFp(1000 + $i)
                ->setNumarBeb(2000 + $i)
                ->setDateStart((new \DateTime('now')))
                ->setHourStart(\DateTime::createFromFormat("H:i", "8:00"))
                ->setDateEnd((new \DateTime('now')))
                ->setLocation($this->loadReference($manager, Location::class))
                ->setDestination($this->loadReference($manager, Destination::class))
                ->setTerminal($this->loadReference($manager, Terminal::class))
                ->setTrip($this->loadReference($manager, Trip::class))
                ->setDriver($this->loadReference($manager, Driver::class))
                ->setTransport($this->loadReference($manager, Transport::class))
                ->setMotorina(20)
                ->setMotorinaRest(10)
                ->setPlan(600)
                ->setOreLucru(\DateTime::createFromFormat("H:i", "8:00"))
                ->setOraRetur(\DateTime::createFromFormat("H:i", "18:00"));
            $manager->persist($entity);
        }
        for($i = 1; $i < $make_records; $i++){
            $entity = new Wayorder();
            $entity->setSeria("AA")
                ->setNumarFp(3000 + $i)
                ->setDateStart((new \DateTime('now')))
                ->setDateEnd((new \DateTime('now')))
                ->setLocation($this->loadReference($manager, Location::class))
                ->setDestination(($this->loadReference($manager, Destination::class))->getTitle())
                ->setDriver($this->loadReference($manager, Driver::class))
                ->setTransport($this->loadReference($manager, Transport::class))
                ->setMotorina(20)
                ->setMotorinaRest(10)
                ->setOreLucru(\DateTime::createFromFormat("H:i", "8:00"));
            $manager->persist($entity);
        }
        $manager->flush();
    }

    public function loadReference(ObjectManager $manager, $entity){
        return $manager->createQueryBuilder()
            ->select('q')
            ->from($entity, 'q')
            ->orderBy('RAND()')
            ->getQuery()
            ->setMaxResults(1)
            ->getSingleResult();
    }

    public function load(ObjectManager $manager)
    {
        $this->loadUser($manager);
        $this->loadData($manager);
    }
}
