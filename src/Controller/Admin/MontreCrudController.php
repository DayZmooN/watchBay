<?php

namespace App\Controller\Admin;

use App\Entity\Montre;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class MontreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Montre::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            TextEditorField::new('description'),
            AssociationField::new('Categories'),
            AssociationField::new('Materiaux'),
            ImageField::new('thumbnail')
                ->setBasePath('img')
                ->setUploadDir('public/img/'),
        ];
    }
}
