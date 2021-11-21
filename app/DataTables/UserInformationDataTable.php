<?php

namespace App\DataTables;

use App\Models\UserInformation;
use Yajra\DataTables\Services\DataTable;

class UserInformationDataTable extends DataTable
{

    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return datatables()
            ->eloquent($this->query())
            ->addColumn('action', function ($data) {
               return '<a href="/user-infos/' . $data->id . '/delete/" class="btn btn-sm btn-danger action-delete" title="Delete"><i class="fa fa-trash"></i></a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Get query source of dataTable.
     * @return \Illuminate\Database\Eloquent\Builder
     * @internal param \App\Models\AgentBalanceTransactionHistory $model
     */
    public function query()
    {
        $query = UserInformation::getUserInformationList();
        $data = $query->select([
            'user_information.*'
        ]);
        return $this->applyScopes($data);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->parameters([
                'dom' => 'Blfrtip',
                'responsive' => true,
                'autoWidth' => false,
                'paging' => true,
                "pagingType" => "full_numbers",
                'searching' => true,
                'info' => true,
                'searchDelay' => 350,
                "serverSide" => true,
                'order' => [[1, 'asc']],
                'buttons' => ['excel', 'csv', 'print', 'reset', 'reload'],
                'pageLength' => 10,
                'lengthMenu' => [[10, 20, 25, 50, 100, 500, -1], [10, 20, 25, 50, 100, 500, 'All']],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'name'        => ['data' => 'name', 'name' => 'name', 'orderable' => true, 'searchable' => true],
            'email'       => ['data' => 'email', 'name' => 'email', 'orderable' => true, 'searchable' => true],
            'number'      => ['data' => 'contact_number', 'name' => 'contact_number', 'orderable' => true, 'searchable' => true],
            'age_range'   => ['data' => 'age_range', 'name' => 'age_range', 'orderable' => true, 'searchable' => true],
            'skills'      => ['data' => 'skills', 'name' => 'skills', 'orderable' => true, 'searchable' => true],
            'institution' => ['data' => 'current_institution', 'name' => 'current_institution', 'orderable' => true, 'searchable' => true],
            'location'    => ['data' => 'location', 'name' => 'location', 'orderable' => true, 'searchable' => true],
            'links'       => ['data' => 'links', 'name' => 'links', 'orderable' => true, 'searchable' => true],
            'action'      => ['searchable' => false]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'user_information_list_' . date('Y_m_d_H_i_s');
    }
}
