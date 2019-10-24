<?php

namespace SalesProgram\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;
use SalesProgram\Order;
use DateInterval;
use DB;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $date = new DateTime;

        // $date = new DateTime('+1 week');
        // $date = new DateTime('+4 days');
        // var_dump($date->modify('-1 week'));

        // $date->add(new DateInterval('P1Y2D'));

        // dd($date->format('Y-m-d'));


        // dd(Carbon::now()->addDays(4));

        // dd(Carbon::now()->subWeeks(2));

        // dd(Carbon::now()->yesterday());



        // $time = Carbon::now()->subYears(1)->timestamp;

        // $date = Carbon::createFromTimestamp($time);


        // $date->month;

        // $date->day;

        // $date->dayOfWeek;

        //$date = Carbon::now()->addDays(4)->addMinutes(25);

        // dd($date->diffForHumans());

        // $date = Carbon::now();

        // dd($date->startOfMonth());

        // dd($date->endOfMonth());

        // dd($date->toFormattedDateString());

        // dd($date->toATOMString());

        // dd(new Carbon('next Wednesday'));

        // dd(new Carbon('last Friday'));

        // $date = new Carbon('this Saturday');

        // dd($date->dayOfWeek);

        // dd($date->month);


        // $order = Order::findOrFail(15);

        // dd($order->created_at->addWeeks(2)->dayOfWeek);

        // dd($order->created_at->diffForHumans());

        // dd($order->created_at->subYears(2)->firstOfYear());

        // dd($order->created_at->subYears(2)->firstOfYear());


        // $order = Order::findOrFail(15);

        // dd($order);

        // $test =DB::table('orders')
        //     ->join('companies', 'orders.company_id', '=', 'companies.id')
        //     ->join('countries', 'companies.countries_id', '=', 'countries.id')
        //     ->selectRaw('orders.created_at, MONTHNAME(orders.created_at) as month, sum(orders.amount_order_total) as revenue')
        //     ->where('orders.created_at', '>=', Carbon::now()->subYears(1)->firstOfYear())
        //     ->groupBy('orders.created_at')
        //     ->get();


        $countries2017 =DB::table('orders')
            ->join('companies', 'orders.company_id', '=', 'companies.id')
            ->join('countries', 'companies.countries_id', '=', 'countries.id')
            ->selectRaw('countries.name, sum(orders.amount_order_total) as revenue')
            ->where('orders.created_at', '>=', Carbon::now()->subYears(1)->firstOfYear())
            ->groupBy('countries.name')
            ->pluck('revenue', 'countries.name');

        $brands2017 =DB::table('detail_orders')
            ->selectRaw('brand_name, sum(subAmount) as revenue')
            ->where('detail_orders.created_at', '>=', Carbon::now()->firstOfYear())
            ->groupBy('brand_name')
            ->pluck('revenue', 'brand_name');
            // ->get();

        // dd($brands2017);

    

        $revenue2017 = Order::lastYear()
        ->selectRaw('created_at, MONTHNAME(created_at) as month, sum(amount_order_total) as revenue')
        ->orderBy('created_at', 'asc')
        ->groupBy('created_at')
        ->pluck('revenue', 'month');

        // dd($revenue2017);

        $revenue2016 = Order::twoYearsAgo()->twoYearsAgoEnd()
            ->selectRaw('created_at, MONTHNAME(created_at) as month, sum(amount_order_total) as revenue')
            ->orderBy('created_at','asc')
            ->groupBy('created_at')
            ->pluck('revenue', 'month');


        $customer2017 = Order::lastYear()
        ->selectRaw('company_name as company, sum(amount_order_total) as revenue')
        ->orderBy('company', 'asc')
        ->groupBy('company')
        ->pluck('revenue', 'company');

        // dd($revenue2016);

        return view('reports.index', compact('revenue2017', 'revenue2016', 'customer2017', 'countries2017', 'brands2017'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
