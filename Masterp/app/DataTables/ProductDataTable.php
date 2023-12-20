<?php

namespace App\DataTables;

use App\Models\categories;
use App\Models\Products;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
// use App\Models\Category;

class ProductDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', function ($query) {
            $editBtn = "<a href='" . route('product.edit', $query->id) . "' class='btn btn-success'><i class='far fa-edit'></i></a>";
            $deleteBtn = "<a href='" . route('product.destroy', $query->id) . "' class='btn btn-danger my-2 delete-item'><i class='fas fa-trash-alt'></i></a>";
            $viewBtn = "<a href='" . route('product.show', $query->id) . "' class='btn btn-warning my-2'><i class='far fa-eye'></i></a>";

            return $editBtn . $deleteBtn
            . $viewBtn;
        })
        ->addColumn('image1', function ($query) {
            return "<img width='55px' height='70px' src='" . asset($query->image1) . "'></img>";
        })
        ->addColumn('image2', function ($query) {
            return "<img width='55px' height='70px' src='" . asset($query->image2) . "'></img>";
        })
        ->addColumn('image3', function ($query) {
            return "<img width='55px' height='70px' src='" . asset($query->image3) . "'></img>";
        })
        ->addColumn('category_name', function ($query) {
            return $query->Category->categoryName;
        })

        ->rawColumns(['action', 'image1', 'image2', 'image3'])
        ->setRowId('id');

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Product $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(products $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('product-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    // ->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        // Button::make('csv'),
                        Button::make('pdf'),
                        // Button::make('print'),
                        // Button::make('reset'),
                        // Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
   

        return [

                Column::make('id'),
                Column::make('productName'),
                Column::make('categoryId'),
                // Column::make('Sdescription')->width(25),
                // Column::make('Ldescription')->width(40),
                Column::make('price'),
                // Column::make('stockqty'),
                // Column::make('status'),
                Column::make('category_name'),
                Column::make('image1'),
                // Column::make('image2')->width(55),
                // Column::make('image3')->width(55),
            // Column::make('updated_at'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->addClass('text-center'),
            ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Product_' . date('YmdHis');
    }
}
