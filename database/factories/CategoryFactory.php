<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->text(8);
        $images = [
            'https://neilpatel.com/wp-content/uploads/2017/09/blog-post-image-guide.jpg',
            'https://cdn3.wpbeginner.com/wp-content/uploads/2016/11/blogimagetools.jpg',
            'https://www.blogtyrant.com/wp-content/uploads/2020/02/how-long-should-a-blog-post-be.png',
            'https://www.hubspot.com/hubfs/how-to-start-a-blog-2.jpg',
            'https://blog.berocket.com/wp-content/uploads/2020/09/97001ed5f3bc56eaefc1152c604184a6.png',
            'https://neilpatel.com/wp-content/uploads/fly-images/177648/Tips-for-Writing-a-Blog-Post-in-Under-60-Minutes-1200x675-c.jpg',
            'https://www.searchenginejournal.com/wp-content/uploads/2020/08/7-ways-a-blog-can-help-your-business-right-now-5f3c06b9eb24e.png'
        ];
        $positions = ['main_menu', 'top', 'normal'];
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'image' => $images[array_rand($images, 1)],
            'position' => $positions[array_rand($positions, 1)],
            'created_at' => Carbon::now()
        ];
    }
}
