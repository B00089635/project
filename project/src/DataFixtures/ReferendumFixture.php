<?php

namespace App\DataFixtures;

use App\Entity\Referendum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ReferendumFixture extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $referendum = new Referendum();
        $referendum->setVotesFor(1);
        $referendum->setVotesAgainst(2);
        $referendum->setDate('28-05-2019');
        $referendum->setDetails('get a brand new su bar');
        $referendum->setTitle('SU Bar');
        $manager->persist($referendum);

        $referendum1 = new Referendum();
        $referendum1->setVotesFor(11);
        $referendum1->setVotesAgainst(1);
        $referendum1->setDate('29-05-2019');
        $referendum1->setDetails('free coffee for all students on wednesday');
        $referendum1->setTitle('Coffee Day');
        $manager->persist($referendum1);

        $referendum2 = new Referendum();
        $referendum2->setVotesFor(31);
        $referendum2->setVotesAgainst(0);
        $referendum2->setDate('30-05-2019');
        $referendum2->setDetails('free condoms for all students on sexual health week');
        $referendum2->setTitle('Sexual Health Week');
        $manager->persist($referendum2);

        $manager->flush();
    }
}