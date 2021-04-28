<?php

namespace App\DataPersister;

use App\Entity\Category;
use App\Entity\Support;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;

/**
 *
 */
class ProductDataPersister implements ContextAwareDataPersisterInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManagerT;

    /**
     * @param Request
     */
    private $requestT;

    public function __construct(
        EntityManagerInterface $entityManager,
        RequestStack $request
    ) {
        $this->entityManagerT = $entityManager;
        $this->requestT = $request->getCurrentRequest();
    }


    /**
     * {@inheritdoc}
     */
    public function supports($data, array $context = []): bool
    {
        return $data instanceof Product;
    }

    /**
     * @param Product $data
     */
    public function persist($data, array $context = [])
    {
        $categoryRepository = $this->entityManagerT->getRepository(Category::class);
        foreach ($data->getIdCategoryProduct() as $category) {
            $t = $categoryRepository->findOneByNameCategory($category->getNameCategory());

            // if the category exists, don't persist it
            if ($t !== null) {
                $data->removeIdCategoryProduct($category);
                $data->addIdCategoryProduct($t);
            } else {
                $this->entityManagerT->persist($category);
            }
        }

        $supportRepository = $this->entityManagerT->getRepository(Support::class);
        foreach ($data->getIdSupportProduct() as $support) {
            $t = $supportRepository->findOneByNameSupport($support->getNameSupport());

            // if the support exists, don't persist it
            if ($t !== null) {
                $data->removeIdSupportProduct($support);
                $data->addIdSupportProduct($t);
            } else {
                $this->entityManagerT->persist($support);
            }
        }

        $this->entityManagerT->persist($data);
        $this->entityManagerT->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function remove($data, array $context = [])
    {
        $this->entityManagerT->remove($data);
        $this->entityManagerT->flush();
    }
}
