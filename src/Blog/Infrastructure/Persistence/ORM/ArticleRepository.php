<?php
declare(strict_types=1);

namespace App\Blog\Infrastructure\Persistence\ORM;

use Doctrine\ORM\EntityRepository;

/**
 * Class ArticleRepository
 */
class ArticleRepository extends EntityRepository
{
    public function findLastArticles($limit = 5)
    {
        $qb = $this->createQueryBuilder('p')
            ->orderBy('p.updatedAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery();

        return $qb->execute();
    }
}
