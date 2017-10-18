<?php
declare(strict_types=1);

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Expr\OrderBy;

/**
 * Class ArticleRepository
 */
class ArticleRepository extends EntityRepository
{
    public function findLastArticles()
    {
        $qb = $this->createQueryBuilder('p')
            ->orderBy('p.updatedAt', 'DESC')
            ->setMaxResults(5)
            ->getQuery();

        return $qb->execute();
    }
}
