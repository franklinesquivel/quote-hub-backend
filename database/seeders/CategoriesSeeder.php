<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    // Based on https://api-ninjas.com/api/quotes doc.
    private const categories = [
        'age',
        'alone',
        'amazing',
        'anger',
        'architecture',
        'art',
        'attitude',
        'beauty',
        'best',
        'birthday',
        'business',
        'car',
        'change',
        'communications',
        'computers',
        'cool',
        'courage',
        'dad',
        'dating',
        'death',
        'design',
        'dreams',
        'education',
        'environmental',
        'equality',
        'experience',
        'failure',
        'faith',
        'family',
        'famous',
        'fear',
        'fitness',
        'food',
        'forgiveness',
        'freedom',
        'friendship',
        'funny',
        'future',
        'god',
        'good',
        'government',
        'graduation',
        'great',
        'happiness',
        'health',
        'history',
        'home',
        'hope',
        'humor',
        'imagination',
        'inspirational',
        'intelligence',
        'jealousy',
        'knowledge',
        'leadership',
        'learning',
        'legal',
        'life',
        'love',
        'marriage',
        'medical',
        'men',
        'mom',
        'money',
        'morning',
        'movies',
        'success'
    ];

    public function run(): void
    {
        collect(self::categories)->each(fn(string $name) => Category::create(compact('name')));
    }
}
