<?php

namespace App\DataTables;

use App\Models\System;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SystemDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('image', function ($data) {
                return '<img src="' . asset('storage/SystemImage/' . $data->image) . '" class="img-thumbnail"
                   width="50%"></img>';
            })
            ->addColumn('action', function ($data) {
                return
                    '<br><a href="' . route("admin.system.edit", $data->id) . '"class="btn btn-outline-info"><i class="fa fa-pencil"></i></a>
                     <button type="button" id="delete_system" data-id= "' . $data->id . '"class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                    ';
            })
            ->editColumn('status', function ($data) {
                if ($data->status == 0) {
                    return '<a data-id="' . $data->id . '"  class="btn-sm btn btn-info status">Free</a>';
                }  else {
                    return '<a data-id="' . $data->id . '"  class="btn-sm  btn btn-success  status">Allocated</a>';
                }
            })
            ->rawColumns(['image','action', 'status'])
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\System $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(System $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('system-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Blfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id')->data('DT_RowIndex')->orderable(false)->title('Sr.no'),
            Column::make('name')->title('Name'),
            Column::make('configration')->title('Configration'),
            Column::make('image')->title('Image'),
            Column::make('status')->title('Status'),
            Column::make('action')->title('Action'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'System_' . date('YmdHis');
    }
}
