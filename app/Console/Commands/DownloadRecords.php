<?php

namespace App\Console\Commands;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Console\Command;

class DownloadRecords extends Command
{
    protected $signature = 'app:records';

    protected $description = 'Downloading a list of entries and comments to them and uploading to the database';


    public function handle(): void
    {
        if ($this->confirm('Начать импорт?', true)) {

            $this->info('Скачивание и загрузка данных...');

            $responsePosts = file_get_contents('https://jsonplaceholder.typicode.com/posts');
            $posts = json_decode($responsePosts);

            $responseComments = file_get_contents('https://jsonplaceholder.typicode.com/comments');
            $comments = json_decode($responseComments);

            foreach ($posts as $post) {
                Post::create([
                    'id' => $post->id,
                    'user_id' => $post->userId,
                    'title' => $post->title,
                    'body' => $post->body,
                ]);
            }

            foreach ($comments as $comment) {
                Comment::create([
                    'id' => $comment->id,
                    'post_id' => $comment->postId,
                    'name' => $comment->name,
                    'email' => $comment->email,
                    'body' => $comment->body,
                ]);
            }

            $this->info('Загружено ' . count($posts) . ' записей и ' . count($comments) . ' комментариев');
        }
    }
}
