<?php

namespace App\Http\Controllers;

use App\Models\SurveyUser;
use Illuminate\Http\Request;
use App\Models\SurveyPertanyaan;
use App\Models\User;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        // dd(session('user'));
        // $map = $this->mapingSurvey(request('params'));
        // return view('pages.dashboard', ['rating' => $map, 'user' => SurveyUser::get()->count()]);
        return view('pages.dashboard');
    }

    public function dataTables()
    {
        $transactions = User::select(['*']);
        $datatables = DataTables::of($transactions)
            ->addIndexColumn()
            ->rawColumns([])
            ->toJson();

        return $datatables;
    }

    private function mapingSurvey($param)
    {
        $data = $this->filterDataByParams($param);
        $survey = SurveyPertanyaan::get();

        $count = 0;
        $result = 0;
        foreach ($data as $item) {
            $count += array_sum($item['value']);
        }
        if (sizeof($survey) > 0 && sizeof($data) > 0) {
            $result = ($count / $survey->count()) / $data->count();
        }
        return number_format($result, 2);
    } 

    private function filterDataByParams($param)
    {
        $data = collect();
        $now = Carbon::now();
        switch ($param) {
            case 'last_7_days':
                $sevenDaysAgo = Carbon::now()->subDays(7)->format('Y-m-d');
                $data = SurveyUser::whereBetween('created_at', [$sevenDaysAgo, Carbon::now()->format('Y-m-d')])->get()->pluck('value');
                break;
            case 'last_1_month':
                $oneMonthAgo = Carbon::now()->subMonth()->format('Y-m-d');
                $data = SurveyUser::whereBetween('created_at', [$oneMonthAgo, Carbon::now()->format('Y-m-d')])->get()->pluck('value');
                break;
            case 'last_3_months':
                $threeMonthAgo = Carbon::now()->subMonths(3)->format('Y-m-d');
                $data = SurveyUser::whereBetween('created_at', [$threeMonthAgo, Carbon::now()->format('Y-m-d')])->get()->pluck('value');
                break;
            default:
                $data = SurveyUser::get();
                break;
        }

        return $data;
    }
}
