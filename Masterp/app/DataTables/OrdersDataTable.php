<?php

namespace App\DataTables;

use App\Models\orderItems;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use App\Models\products;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrdersDataTable extends DataTable
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
            ->addColumn('prouct_name', function ($query) {
                return $query->product->productName ?? 'N/A';
            })

            ->addColumn('Price', function ($query) {
                return $query->product->price ?? 'N/A';
            })


            ->addColumn('Price_of_sale', function ($query) {
                return $query->order->totalPrice ?? 'N/A';
            })

            ->addColumn('Total_Price', function ($query) {
                return $query->price ?? 'N/A';
            })

           
            ->addColumn('customer_name', function ($query) {
                return $query->user->name ?? 'N/A'; // Use 'N/A' as a default value if user is null
            })

            
            
            ->addColumn('image', function ($query) {
                return "<img width='100px' src='" . asset($query->product->image1 ?? 'N/A') . "'></img>" ;
            })

            ->rawColumns([ 'image', 'prouct_name', 'Price', 'Price_of_sale', 'customer_name', 'Total_Price'  ])
            ->setRowId('id');

     }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\orderItems $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(orderItems $model): QueryBuilder
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
                    ->setTableId('orders-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    // ->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
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
           
            // Column::make('id'),
            Column::make('prouct_name'),
            Column::make('Price'),
            Column::make('quantity'),
            Column::make('Total_Price'),
            Column::make('Price_of_sale'),
            Column::make('orderId'),
            Column::make('customerId'),
            Column::make('customer_name'),
            
            Column::make('image'),
            // Column::make('Price'),
            // Column::computed('action')
            // ->exportable(false)
            // ->printable(false)
            // ->width(60)
            // ->addClass('text-center'),
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
