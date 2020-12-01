<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            [
                'id' => Str::uuid()->toString(),
                'title' => 'blog 1',
                'description' => 'description 1',
                'image' => 'https://www.digitalvidya.com/wp-content/uploads/2019/03/personal-blog.jpg'
            ],
            [
                'id' => Str::uuid()->toString(),
                'title' => 'blog 2',
                'description' => 'description 2',
                'image' => 'https://www.onblastblog.com/wp-content/uploads/2018/05/free-images-for-blogs.jpeg'
            ],
            [
                'id' => Str::uuid()->toString(),
                'title' => 'blog 3',
                'description' => 'description 3',
                'image' => 'https://gogreenbella.files.wordpress.com/2012/04/blog.jpg'
            ],
            [
                'id' => Str::uuid()->toString(),
                'title' => 'blog 4',
                'description' => 'description 4',
                'image' => 'https://www.digitalvidya.com/wp-content/uploads/2017/06/Learn_Blogging-1280x720.jpg'
            ],
        ]);
    }
}
