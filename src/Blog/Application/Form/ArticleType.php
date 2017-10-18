<?php
declare(strict_types=1);

namespace App\Blog\Application\Form;

use App\Blog\Domain\Entity\Article;
use App\Blog\Domain\Entity\Author;
use App\Blog\Domain\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ArticleType
 */
class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('slug')
            ->add('content')
            ->add('author', EntityType::class, [
                'class' => Author::class,
            ])
            ->add('categories', EntityType::class, [
                'class' => Category::class,
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
