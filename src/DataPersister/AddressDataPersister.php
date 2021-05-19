<?php

namespace App\DataPersister;

use Symfony\Component\Security\Core\Security;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;

abstract class AddressDataPersister implements ContextAwareDataPersisterInterface
{

    /**
     * @param Security
     */

    private $entityManagerT;
    private $requestT;
    private $securityT;

    public function __construct(
        EntityManagerInterface $entityManager,
        RequestStack $request,
        Security $security
    ) {
        $this->entityManagerT = $entityManager;
        $this->requestT = $request->getCurrentRequest();
        $this->securityT = $security;
    }

    /**
     * @param ShippingAddress $data
     */
    public function persist($data, array $context = [])
    {
        // Set the author if it's a new Address
        if ($this->requestT->getMethod() === 'PUT') {
            $data->setUser($this->securityT->getUser());
        }

        $this->entityManagerT->persist($data);
        $this->entityManagerT->flush();
    }
}
