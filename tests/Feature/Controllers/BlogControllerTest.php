<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Blog;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->create());

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_blogs()
    {
        $blogs = Blog::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('blogs.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.blogs.index')
            ->assertViewHas('blogs');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_blog()
    {
        $response = $this->get(route('blogs.create'));

        $response->assertOk()->assertViewIs('app.blogs.create');
    }

    /**
     * @test
     */
    public function it_stores_the_blog()
    {
        $data = Blog::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('blogs.store'), $data);

        $this->assertDatabaseHas('blogs', $data);

        $blog = Blog::latest('id')->first();

        $response->assertRedirect(route('blogs.edit', $blog));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_blog()
    {
        $blog = Blog::factory()->create();

        $response = $this->get(route('blogs.show', $blog));

        $response
            ->assertOk()
            ->assertViewIs('app.blogs.show')
            ->assertViewHas('blog');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_blog()
    {
        $blog = Blog::factory()->create();

        $response = $this->get(route('blogs.edit', $blog));

        $response
            ->assertOk()
            ->assertViewIs('app.blogs.edit')
            ->assertViewHas('blog');
    }

    /**
     * @test
     */
    public function it_updates_the_blog()
    {
        $blog = Blog::factory()->create();

        $user = User::factory()->create();

        $data = [
            'name' => $this->faker->text(255),
            'user_id' => $user->id,
        ];

        $response = $this->put(route('blogs.update', $blog), $data);

        $data['id'] = $blog->id;

        $this->assertDatabaseHas('blogs', $data);

        $response->assertRedirect(route('blogs.edit', $blog));
    }

    /**
     * @test
     */
    public function it_deletes_the_blog()
    {
        $blog = Blog::factory()->create();

        $response = $this->delete(route('blogs.destroy', $blog));

        $response->assertRedirect(route('blogs.index'));

        $this->assertDeleted($blog);
    }
}
