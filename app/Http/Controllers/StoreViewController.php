<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\Account; 
use App\Models\Sold; 
use App\Models\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StoreViewController extends Controller
{
    public function dashboard()
    {
        $count = Item::where('company_id', session('user_id'))->count();
        $count_items = $count > 0 ? $count : 0;

        $owner = Account::find(session('user_id'));
        $owner_name = $owner ? ucfirst($owner->name) : 'Store name';

        // Get current month and year
        $now = Carbon::now();
        $month = $now->format('F');
        $year = $now->year;

        // Filter Sold records for this month
        $total_sales = Sold::where('company_id', session('user_id'))
            ->whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->sum('sales');

        $total_profit = Sold::where('company_id', session('user_id'))
            ->whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->sum('profit');

        // Get top 5 sales categories for this month
        $top_categories = Sold::select('category', DB::raw('SUM(sales) as total_sales'))
            ->where('company_id', session('user_id'))
            ->whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->groupBy('category')
            ->orderByDesc('total_sales')
            ->limit(5)
            ->get();

        $bar_labels = $top_categories->pluck('category')->toArray();
        $bar_data = $top_categories->pluck('total_sales')->toArray();

        // Fetch monthly sales for the current year (for line chart)
        $monthly_sales = Sold::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(sales) as total_sales')
            )
            ->where('company_id', session('user_id'))
            ->whereYear('created_at', $now->year)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('month')
            ->get();

        // Prepare data for all 12 months
        $line_labels = [];
        $line_data = [];
        for ($i = 1; $i <= 12; $i++) {
            $line_labels[] = Carbon::create()->month($i)->format('M');
            $month_sales = $monthly_sales->firstWhere('month', $i);
            $line_data[] = $month_sales ? (float)$month_sales->total_sales : 0;
        }

        return view('store.dashboard', compact(
            'count_items',
            'owner_name',
            'total_sales',
            'total_profit',
            'month',
            'year',
            'bar_labels',
            'bar_data',
            'line_labels',
            'line_data'
        ));
    }

    public function product()
    {
        $db_items = Item::where('company_id', session('user_id'))->get();
        $db_categories = Category::where('company_id', session('user_id'))->get();
        $owner = Account::find(session('user_id')); // Use Account model
        $owner_name = $owner ? ucfirst($owner->name) : 'Store name';
        return view('store.product', compact('db_categories', 'db_items', 'owner_name'));
    }

    public function sold()
    {
        $owner = Account::find(session('user_id'));
        $owner_name = $owner ? ucfirst($owner->name) : 'Store name';

        // Fetch sold products for this company/user
        $sold_products = Sold::where('company_id', session('user_id'))->orderBy('created_at', 'desc')->get();

        return view('store.sold', compact('owner_name', 'sold_products'));
    }

    public function logs()
    {
        $owner = Account::find(session('user_id'));
        $owner_name = $owner ? ucfirst($owner->name) : 'Store name';
        
        $logs = Log::where('company_id',session('user_id'))->get();

        return view('store.logs',compact('owner_name','logs'));
    }
}
