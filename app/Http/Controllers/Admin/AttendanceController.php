<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Attendance\AttendanceRepositoryInterface;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    private AttendanceRepositoryInterface $attendanceRepository;

    /**
     * AttendanceController constructor.
     * @param AttendanceRepositoryInterface $attendanceRepository
     */
    public function __construct(
        AttendanceRepositoryInterface $attendanceRepository
    ) {
        $this->attendanceRepository = $attendanceRepository;
    }

    /**
     * 受講一覧
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $condition = $request->get('condition', []);
        $attendances = $this->attendanceRepository->getByConditionPaginate($condition);
        $userType = 'admin';

        return view('attendances.index', compact('attendances', 'condition', 'userType'));
    }
}
