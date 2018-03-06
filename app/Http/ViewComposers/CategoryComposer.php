<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use App\Categories;

class CategoryComposer
{
    /**
     * @var Categories
     */
    protected $categories;

  
    public function __construct(Categories $categories)
    {
        // Dependencies automatically resolved by service container...
        $this->categories = $categories;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('menuCategories', $this->categories->get());
    }
}