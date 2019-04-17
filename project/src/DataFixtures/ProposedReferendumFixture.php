<?php

namespace App\DataFixtures;

use App\Entity\ProposedReferendum;
use App\Entity\ProposedReferendumReferendum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ProposedReferendumFixture extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $proposedReferendum = new ProposedReferendum();
        $proposedReferendum->setDetails('Charity Days each week');
        $proposedReferendum->setSupport(49);
        $proposedReferendum->setUser('B00089635');
        $manager->persist($proposedReferendum);

        $proposedReferendum1 = new ProposedReferendum();
        $proposedReferendum1->setDetails('More Assignments');
        $proposedReferendum1->setSupport(0);
        $proposedReferendum1->setUser('B00097410');
        $manager->persist($proposedReferendum1);

        $proposedReferendum2 = new ProposedReferendum();
        $proposedReferendum2->setDetails('More Reading Weeks');
        $proposedReferendum2->setSupport(43);
        $proposedReferendum2->setUser('B00089600');
        $manager->persist($proposedReferendum2);

        $proposedReferendum3 = new ProposedReferendum();
        $proposedReferendum3->setDetails('Shorter class times');
        $proposedReferendum3->setSupport(12);
        $proposedReferendum3->setUser('B00089776');
        $manager->persist($proposedReferendum3);

        $manager->flush();
    }
}