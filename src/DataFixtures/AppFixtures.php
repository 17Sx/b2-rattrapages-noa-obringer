<?php

namespace App\DataFixtures;

use App\Entity\Employee;
use App\Entity\Restaurant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    // Fchargée données de base
    public function load(ObjectManager $manager): void
    {
        // creation des restaurants
        $restaurants = [
            [
                'name' => 'Mongo - Champs-Élysées',
                'address' => '25 avenue des Champs-Élysées',
                'city' => 'Paris',
                'postalCode' => '75008',
                'phone' => '0123456789',
                'description' => 'Restaurant Mongo au cœur des Champs-Élysées'
            ],
            [
                'name' => 'Mongo - République',
                'address' => '15 place de la République',
                'city' => 'Paris',
                'postalCode' => '75011',
                'phone' => '0123456790',
                'description' => 'Restaurant Mongo sur la place de la République'
            ],
            [
                'name' => 'Mongo - Part-Dieu',
                'address' => '8 place de la Part-Dieu',
                'city' => 'Lyon',
                'postalCode' => '69003',
                'phone' => '0123456791',
                'description' => 'Restaurant Mongo à Lyon Part-Dieu'
            ],
            [
                'name' => 'Mongo - Vieux Lyon',
                'address' => '12 rue Saint-Jean',
                'city' => 'Lyon',
                'postalCode' => '69005',
                'phone' => '0123456792',
                'description' => 'Restaurant Mongo dans le Vieux Lyon'
            ],
            [
                'name' => 'Mongo - La Défense',
                'address' => '5 place de la Défense',
                'city' => 'Paris',
                'postalCode' => '92000',
                'phone' => '0123456793',
                'description' => 'Restaurant Mongo à La Défense'
            ]
        ];

        $restaurantEntities = [];
        foreach ($restaurants as $restaurantData) {
            $restaurant = new Restaurant();
            $restaurant->setName($restaurantData['name']);
            $restaurant->setAddress($restaurantData['address']);
            $restaurant->setCity($restaurantData['city']);
            $restaurant->setPostalCode($restaurantData['postalCode']);
            $restaurant->setPhone($restaurantData['phone']);
            $restaurant->setDescription($restaurantData['description']);

            $manager->persist($restaurant);
            $restaurantEntities[] = $restaurant;
        }
        

        // creation des employés
        $employees = [
            [
                'name' => 'Jean Dupont',
                'email' => 'jean.dupont@mongo.com',
                'active' => true,
                'restaurant' => 0
            ],
            [
                'name' => 'Marie Martin',
                'email' => 'marie.martin@mongo.com',
                'active' => true,
                'restaurant' => 0
            ],
            [
                'name' => 'Pierre Durand',
                'email' => 'pierre.durand@mongo.com',
                'active' => true,
                'restaurant' => 1
            ],
            [
                'name' => 'Sophie Bernard',
                'email' => 'sophie.bernard@mongo.com',
                'active' => false,
                'restaurant' => 1
            ],
            [
                'name' => 'Lucas Petit',
                'email' => 'lucas.petit@mongo.com',
                'active' => true,
                'restaurant' => 2
            ],
            [
                'name' => 'Emma Dubois',
                'email' => 'emma.dubois@mongo.com',
                'active' => true,
                'restaurant' => 3
            ],
            [
                'name' => 'Thomas Moreau',
                'email' => 'thomas.moreau@mongo.com',
                'active' => true,
                'restaurant' => 4
            ]
        ];

        foreach ($employees as $employeeData) {
            $employee = new Employee();
            $employee->setName($employeeData['name']);
            $employee->setEmail($employeeData['email']);
            $employee->setActive($employeeData['active']);
            $employee->setRestaurant($restaurantEntities[$employeeData['restaurant']]);

            $manager->persist($employee);
        }

        $manager->flush();
    }
}
