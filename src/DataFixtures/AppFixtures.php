<?php

namespace App\DataFixtures;

use App\Entity\Author;
use App\Entity\Book;
use App\Entity\Editor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
            $author = new Author();
            $author->setName('Author ' . $i);
            $author->setAge(rand(20, 80));
            $manager->persist($author);
        }

        $manager->flush();

        $allAuthor = $manager->getRepository(Author::class)->findAll();

        for ($i = 0; $i < 10; $i++) {
            $book = new Book();
            $book->setName('Book ' . $i);
            $book->setAuthor($allAuthor[rand(0, 9)]);
            $manager->persist($book);
        }

        for ($i = 0; $i < 10; $i++) {
            $editor = new Editor();
            $editor->setName('Editor ' . $i);
            $manager->persist($editor);
        }

        $manager->flush();
    }
}
