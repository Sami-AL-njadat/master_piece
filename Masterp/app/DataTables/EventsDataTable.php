<?php

namespace App\DataTables;

use App\Models\events;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EventsDataTable extends DataTable
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
                $editBtn = "<a href='" . route('eventes.edit', $query->id) . "' class='btn btn-success'><i class='far fa-edit'></i></a>";
                $deleteBtn = "<a href='" . route('eventes.destroy', $query->id) . "' class='btn btn-danger my-2 delete-item'><i class='fas fa-trash-alt'></i></a>";
            $viewBtn = "<a href='" . route('eventes.show', $query->id) . "' class='btn btn-warning my-2'><i class='far fa-eye'></i></a>";

                return $editBtn . $deleteBtn . $viewBtn;
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
            ->addColumn('idname', function ($query) {
                return $query->eventTypes->name;
            })

            ->rawColumns(['action', "idname", 'image1', 'image2', 'image3'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\events $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(events $model): QueryBuilder
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
            ->setTableId('events-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
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

            Column::make('id'),
            Column::make('EventTypeId'),
            Column::make('name'),
            Column::make('title'),
            // Column::make('clientRequest'),
            // Column::make('aboutProject'),
            // Column::make('idea'),
            Column::make('image1'),
            // Column::make('image2'),
            // Column::make('image3'),
            // Column::make('beginning'),
            // Column::make('ending'),
            Column::make('clientName'),
            Column::make('contractValue'),

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
        return 'Events_' . date('YmdHis');
    }
}
