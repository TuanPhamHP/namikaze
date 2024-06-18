<?php

namespace App\Console\Commands;

use App\Models\ProductCategory;
use App\Transformers\CustomSerializer;
use App\Transformers\ProductCategoryTransformer;
use Illuminate\Console\Command;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $productCategory = ProductCategory::query()->first();


        $manager = new Manager();

        $manager->setSerializer(new CustomSerializer());

        $resource = new Item($productCategory, new ProductCategoryTransformer());

        $data = $manager->createData($resource);
        dd($data->toArray());
        return 0;
    }
}
