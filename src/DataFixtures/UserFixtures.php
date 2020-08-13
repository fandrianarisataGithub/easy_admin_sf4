<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    
    public function load(ObjectManager $manager)
    {
            

        for ($i=1; $i <10 ; $i++) { 
                    $user = new User() ;
                    $user->setPassword($this->passwordEncoder->encodePassword($user,"password".$i));
                    $user->setEmail("user".$i."@gmail.com"); 
                        
                if($i%2 == 0){
                        $user->setRoles(array('super admin')) ;
                }
                else {
                    $user->setRoles(array('admin')) ;
                }
                $manager->persist($user);
        }
        $manager->flush();  
    }
}