<?php
declare(strict_types=1);

namespace App\Blog\UI\Controller;

use App\Blog\Domain\Entity\Article;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class DefaultController
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $articles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findLastArticles();

        return $this->render('default/index.html.twig', [
            'articles' => $articles,
        ]);
    }
}
