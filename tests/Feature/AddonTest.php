<?php

namespace Tests\Feature;

use App\Models\Addon;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AddonTest extends TestCase
{
    use RefreshDatabase;

    public function test_addons_index_page_returns_successful_response_and_displays_addons(): void
    {
        $category = Category::create([
            'name' => 'Lokomotif',
            'slug' => 'lokomotif',
        ]);

        $addon = Addon::create([
            'category_id' => $category->id,
            'title' => 'Loko CC201',
            'slug' => 'loko-cc201',
            'description' => 'Ini adalah lokomotif CC201.',
            'thumbnail' => 'addons/cc201.jpg',
            'download_url' => 'https://example.com/download/cc201',
            'source_name' => 'NRATrainz',
            'file_size' => '12 MB',
            'addon_type' => 'freeware',
            'status' => 'published',
            'is_featured' => false,
        ]);

        $response = $this->get('/addons');

        $response->assertStatus(200);
        $response->assertSee('Koleksi NRATrainz');
        $response->assertSee('Loko CC201');
        $response->assertSee('Detail');
        $response->assertSee('Download');
    }

    public function test_addon_detail_page_returns_successful_response_and_displays_details(): void
    {
        $category = Category::create([
            'name' => 'Lokomotif',
            'slug' => 'lokomotif',
        ]);

        $addon = Addon::create([
            'category_id' => $category->id,
            'title' => 'Loko CC201',
            'slug' => 'loko-cc201',
            'description' => 'Ini adalah lokomotif CC201.',
            'thumbnail' => 'addons/cc201.jpg',
            'download_url' => 'https://example.com/download/cc201',
            'source_name' => 'NRATrainz',
            'file_size' => '12 MB',
            'addon_type' => 'freeware',
            'status' => 'published',
            'is_featured' => false,
        ]);

        $response = $this->get('/addons/loko-cc201');

        $response->assertStatus(200);
        $response->assertSee('Loko CC201');
        $response->assertSee('Ini adalah lokomotif CC201.');
        $response->assertSee('Lokomotif');
        $response->assertSee('12 MB');
        $response->assertSee('Download Addon');
    }
}
