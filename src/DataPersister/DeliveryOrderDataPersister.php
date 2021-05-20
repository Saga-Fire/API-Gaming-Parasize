<?php

namespace App\DataPersister;

use Symfony\Component\Security\Core\Security;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;

abstract class DeliveryOrderDataPersister implements ContextAwareDataPersisterInterface
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
     * @param DeliveryOrder $data
     */
    public function persist($data, array $context = [])
    {
        // Set the author if it's a new DeliveryOrder
        if ($this->requestT->getMethod() === 'POST') {
            $data->setNameUserOrder($this->securityT->getUser());
        }

        $this->entityManagerT->persist($data);
        $this->entityManagerT->flush();
    }
}
