<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('admin');

        $user->setPassword(
            $this->encoder->encodePassword($user, '0000')
        );

        $user->setEmail('a@hotmail.com');

        $user->setRole('ROLE_ADMIN');

        $manager->persist($user);

        $user1 = new User();
        $user1->setUsername('B00089635');

        $user1->setPassword(
            $this->encoder->encodePassword($user1, '9999')
        );

        $user1->setEmail('b@hotmail.com');

        $user1->setRole('ROLE_STUDENT');


        $manager->persist($user1);

        $user2 = new User();
        $user2->setUsername('B00097410');

        $user2->setPassword(
            $this->encoder->encodePassword($user2, '9999')
        );

        $user2->setEmail('c@hotmail.com');

        $user2->setRole('ROLE_STUDENT');


        $manager->persist($user2);

        $user3 = new User();
        $user3->setUsername('B00096918');

        $user3->setPassword(
            $this->encoder->encodePassword($user3, '9999')
        );

        $user3->setEmail('d@hotmail.com');

        $user3->setRole('ROLE_STUDENT');


        $manager->persist($user3);

        $manager->flush();
    }
}