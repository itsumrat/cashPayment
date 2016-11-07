<?php

namespace App\DataTables;

use App\Transaction;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Services\DataTable;

class TransactionsDataTable extends DataTable
{
    // protected $printPreview  = 'path.to.print.preview.view';

    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        $q =  $this->datatables
            ->eloquent($this->query());
            if (Auth::user()->hasRole('Administrator')){
                $q =  $q->where('from', '=', Auth::user()->id);
            }
            elseif (Auth::user()->hasRole('Reseller')){
                $q =  $q->where('from', '=', Auth::user()->id);
            }
            elseif (Auth::user()->hasRole('Agent')){
                $q =  $q->Where('to_id', '=', Auth::user()->id);

                $q =  $q->addColumn('action', function ($q) {

                    if($q->status=='accepted'){
                        return '<a href="#" class="btn btn-xs btn-success"><i class="fa fa-check-square"></i> Accepted</a>';
                    }
                    elseif($q->status=='denied'){
                        return '<a href="#" class="btn btn-xs btn-success"><i class="fa fa-check-square"></i> Denied</a>';
                    }else{
                        $d = '<a href="'.route('transactions.edit',$q->id).'" class="btn btn-xs btn-primary"><i class="fa fa-square"></i>Accept</a> | <a href="'.route('transactions.edit',$q->id).'" class="btn btn-xs btn-danger"><i class="fa fa-square"></i>Deny</a>';

                        return $d;
                    }

                });
            }


        return $q->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {

        $transactions = Transaction::query();

        return $this->applyScopes($transactions);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        $b =  $this->builder()
                    ->columns($this->getColumns())
                    ->ajax('');
        if (Auth::user()->hasRole('Agent')) {
            $b = $b->addAction(['width' => '130px']);
        }else{
            $b = $b->addAction(['width' => '10px']);
        }
        return  $b->parameters([
        'dom' => 'Bfrtip',
        'buttons' => ['csv', 'excel', 'pdf', 'print', 'reset', 'reload'],
    ]);
       // return  $b->parameters($this->getBuilderParameters());

    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {

        if(Auth::user()->hasRole('Agent')){
            return [
                'from',
                'mobile',
                'no_type',
                'payment_method',
                'amount',
                'status',
                'remarks',
                'created_at'
            ];
        }elseif(Auth::user()->hasRole('Reseller')){
            return [
                'from',
                'mobile',
                'no_type',
                'payment_method',
                'amount',
                'status',
                'remarks',
                'created_at'
            ];
        }
        else{
            return [
                'from',
                'to_id',
                'amount',
                'status',
                'created_at'
            ];
        }

    }



    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'transactions';
    }
}
