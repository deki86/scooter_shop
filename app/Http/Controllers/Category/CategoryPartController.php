<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\PartCategory;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class CategoryPartController extends Controller
{
    /**
     * Display a listing of the parts associate with categories
     *
     * @return mixed
     */
    public function index(PartCategory $category)
    {
        $sub = PartCategory::with('subcategories')->get();

        $parts = $category->subcategories()
            ->with('part')
            ->get()
            ->pluck('part')
            ->collapse();

        $parts = $this->paginate($parts, 9);

        return view('parts', compact('parts', 'sub'));
    }

    /**
     * Protected paginate function for paginate collection
     * @param  Collection $items
     * @param  integer $perPage
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    protected function paginate($items, $perPage)
    {
        $pageStart = request('page', 1);
        $offSet = ($pageStart * $perPage) - $perPage;
        $itemsForCurrentPage = $items->slice($offSet, $perPage);

        return new LengthAwarePaginator(
            $itemsForCurrentPage, $items->count(), $perPage,
            Paginator::resolveCurrentPage(),
            ['path' => Paginator::resolveCurrentPath()]
        );
    }

}
