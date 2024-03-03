<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Creator;
use App\Models\Category;
use Carbon\Carbon;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        info("Cron Job running at sitemap ". now());

        $sitemap = Sitemap::create();
        Creator::get()->each(function (Creator $creator, $index) use ($sitemap) {
            $sitemap->add(
                Url::create("{$creator->slug}")
                ->setPriority(0.1)
                ->setLastModificationDate($creator->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            );
        });

        Category::get()->each(function (Category $category) use ($sitemap) {
            $sitemap->add(
                Url::create("marketplace/creator/category/{$category->slug}")
                ->setPriority(0.2)
                ->setLastModificationDate($category->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            );
        });


        $sitemap->add(
            Url::create("marketplace/creator")
            ->setPriority(0.3)
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        );


        $sitemap->add(
            Url::create("marketplace/campaign")
            ->setPriority(0.4)
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        );


        $sitemap->add(
            Url::create("login")
            ->setPriority(0.5)
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        );

        $sitemap->add(
            Url::create("register")
            ->setPriority(0.6)
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        );

        $sitemap->add(
            Url::create("support")
            ->setPriority(0.7)
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        );

        $sitemap->add(
            Url::create("pages/privacy-policy")
            ->setPriority(0.8)
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        );

        $sitemap->add(
            Url::create("pages/terms-of-service")
            ->setPriority(0.9)
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        );

        $sitemap->add(
            Url::create("suggestions")
            ->setPriority(1.0)
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        );

        $sitemap->add(
            Url::create("password/reset")
            ->setPriority(1.1)
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        );

        $sitemap->add(
            Url::create("blog")
            ->setPriority(1.2)
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        );

        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
