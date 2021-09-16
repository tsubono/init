<?php

namespace App\Http\Middleware;

use App\Repositories\Setting\SettingRepositoryInterface;
use Closure;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CheckForMaintenanceMode
{
    private SettingRepositoryInterface $settingRepository;

    /**
     * CheckForMaintenanceMode constructor.
     * @param SettingRepositoryInterface $settingRepository
     */
    public function __construct(SettingRepositoryInterface $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // メンテナンスモードがONに場合
        $setting = $this->settingRepository->getOne();
        if ($setting->is_maintenance && $request->getPathInfo() !== '/admin/login') {
            // 管理者のみ表示できるようにする
            if (!auth()->guard('admin')->check())
                throw new HttpException(503);
        }

        return $next($request);
    }
}