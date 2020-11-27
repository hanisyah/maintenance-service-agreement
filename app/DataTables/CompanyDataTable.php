<?php

namespace App\DataTables;

use App\Company;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CompanyDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
        ->addIndexColumn()
            ->addColumn('user_confirm', function($request){  
                      
                return view ('datatables._edit',[
                'model'    => $request,
                'edit_url' => route('company.edit', $request->id),
                    // 'confirm_message' => 'Yakin ingin close project ' . $request->project_code . '?'
                 ]);                            
            })
    ->rawColumns(['user_confirm']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\CompanyDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $query = Company::all();
        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('companydatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
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
            (['data' => 'DT_RowIndex', 'name' => 'No' , 'title' => 'No','orderable' => false, 'searchable' => false]),
            (['data' => 'comShortname', 'name' => 'comShortname' , 'title' => 'Company Shortname']),
            (['data' => 'comName', 'name' => 'comName' , 'title' => 'Company Name']),
            (['data' => 'comAddress', 'name' => 'comAddress' , 'title' => 'Company Address']),
            (['data' => 'comPhone', 'name' => 'comPhone' , 'title' => 'Company Phone']),
            (['data'=> 'user_confirm' ,'name' => 'user_confirm' , 'title' => '' ,'orderable' => false,'searchable' => false, 'width' => '25px']),
            
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Company_' . date('YmdHis');
    }
}
