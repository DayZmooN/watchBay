<?php

namespace App\Controller\Admin;

use App\Entity\Materiaux;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MateriauxCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Materiaux::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
