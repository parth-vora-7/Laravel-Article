<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Article;
use App\User;

class ArticleUser extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:articleuser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To assign users to the articles';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $user_ids = User::pluck('id');
        if (!$user_ids) {
            $this->error('No user exist in database');
            exit;
        }
        $article_ids = Article::pluck('id')->toArray();

        if (!$article_ids) {
            $this->error('No article exist in database');
            exit;
        }

        $bar = $this->output->createProgressBar(count($article_ids));

        foreach ($article_ids as $aid) {
            $article = Article::find($aid);
            $article->user_id = $user_ids->random();
            $article->save();
            $bar->advance();
        }
        $bar->finish();
    }

}
