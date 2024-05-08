<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

class ContentBlocksSeed extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            [
                'parent' => 'global',
                'label' => 'Website Title',
                'description' => 'Shown on the home page, as well as any tabs in the users browser.',
                'slug' => 'website-title',
                'type' => 'text',
                'value' => 'ugie-cake/cakephp-content-blocks-example-app',
            ],
            [
                'parent' => 'image gallery',
                'label' => 'Shown Image 1',
                'description' => 'The image shown in the home page image gallery.',
                'slug' => 'shown-image-1',
                'type' => 'image',
            ],
            [
                'parent' => 'image gallery',
                'label' => 'Shown Image 2',
                'description' => 'The image shown in the home page image gallery.',
                'slug' => 'shown-image-2',
                'type' => 'image',
            ],
            [
                'parent' => 'image gallery',
                'label' => 'Shown Image 3',
                'description' => 'The image shown in the home page image gallery.',
                'slug' => 'shown-image-3',
                'type' => 'image',
            ],
            [
                'parent' => 'image gallery',
                'label' => 'Shown Image 4',
                'description' => 'The image shown in the home page image gallery.',
                'slug' => 'shown-image-4',
                'type' => 'image',
            ],
            [
                'parent' => 'home',
                'label' => 'Banner',
                'description' => 'A banner shown at the top of the home page.',
                'slug' => 'banner',
                'type' => 'text',
                'value' => '25% off all menu items before May 20.',
            ],
            [
                'parent' => 'home',
                'label' => 'Copyright Message',
                'description' => 'Copyright information shown at the bottom of the home page.',
                'slug' => 'copyright-message',
                'type' => 'text',
                'value' => '(c) Copyright 2023, enter copyright owner here.',
            ],
        ];

        $table = $this->table('content_blocks');
        $table->insert($data)->save();
    }
}
