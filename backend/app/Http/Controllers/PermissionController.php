<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PermissionController extends Controller
{
    /**
     * 获取菜单列表
     */
    public function getMenuList(Request $request): JsonResponse
    {
        return response()->json([
            'code' => 0,
            'message' => 'success',
            'data' => [
                'list' => [
                    [
                        'path' => '/dashboard',
                        'name' => 'Dashboard',
                        'component' => 'Layout',
                        'redirect' => '/dashboard/base',
                        'meta' => [
                            'title' => 'menu.dashboard.title',
                            'icon' => 'dashboard',
                        ],
                        'children' => [
                            [
                                'path' => 'base',
                                'name' => 'DashboardBase',
                                'component' => '/dashboard/base/index',
                                'meta' => [
                                    'title' => 'menu.dashboard.base.title',
                                ],
                            ],
                            [
                                'path' => 'detail',
                                'name' => 'DashboardDetail',
                                'component' => '/dashboard/detail/index',
                                'meta' => [
                                    'title' => 'menu.dashboard.base.detail',
                                ],
                            ],
                        ],
                    ],
                    [
                        'path' => '/list',
                        'name' => 'List',
                        'component' => 'Layout',
                        'redirect' => '/list/base',
                        'meta' => [
                            'title' => 'menu.list.title',
                            'icon' => 'view-list',
                        ],
                        'children' => [
                            [
                                'path' => 'base',
                                'name' => 'ListBase',
                                'component' => '/list/base/index',
                                'meta' => [
                                    'title' => 'menu.list.base.title',
                                ],
                            ],
                            [
                                'path' => 'card',
                                'name' => 'ListCard',
                                'component' => '/list/card/index',
                                'meta' => [
                                    'title' => 'menu.list.card.title',
                                ],
                            ],
                            [
                                'path' => 'filter',
                                'name' => 'ListFilter',
                                'component' => '/list/filter/index',
                                'meta' => [
                                    'title' => 'menu.list.filter.title',
                                ],
                            ],
                            [
                                'path' => 'tree',
                                'name' => 'ListTree',
                                'component' => '/list/tree/index',
                                'meta' => [
                                    'title' => 'menu.list.tree.title',
                                ],
                            ],
                        ],
                    ],
                    [
                        'path' => '/form',
                        'name' => 'Form',
                        'component' => 'Layout',
                        'redirect' => '/form/base',
                        'meta' => [
                            'title' => 'menu.form.title',
                            'icon' => 'edit',
                        ],
                        'children' => [
                            [
                                'path' => 'base',
                                'name' => 'FormBase',
                                'component' => '/form/base/index',
                                'meta' => [
                                    'title' => 'menu.form.base.title',
                                ],
                            ],
                            [
                                'path' => 'step',
                                'name' => 'FormStep',
                                'component' => '/form/step/index',
                                'meta' => [
                                    'title' => 'menu.form.step.title',
                                ],
                            ],
                        ],
                    ],
                    [
                        'path' => '/detail',
                        'name' => 'Detail',
                        'component' => 'Layout',
                        'redirect' => '/detail/base',
                        'meta' => [
                            'title' => 'menu.detail.title',
                            'icon' => 'layers',
                        ],
                        'children' => [
                            [
                                'path' => 'base',
                                'name' => 'DetailBase',
                                'component' => '/detail/base/index',
                                'meta' => [
                                    'title' => 'menu.detail.base.title',
                                ],
                            ],
                            [
                                'path' => 'advanced',
                                'name' => 'DetailAdvanced',
                                'component' => '/detail/advanced/index',
                                'meta' => [
                                    'title' => 'menu.detail.advanced.title',
                                ],
                            ],
                            [
                                'path' => 'deploy',
                                'name' => 'DetailDeploy',
                                'component' => '/detail/deploy/index',
                                'meta' => [
                                    'title' => 'menu.detail.deploy.title',
                                ],
                            ],
                            [
                                'path' => 'secondary',
                                'name' => 'DetailSecondary',
                                'component' => '/detail/secondary/index',
                                'meta' => [
                                    'title' => 'menu.detail.secondary.title',
                                ],
                            ],
                        ],
                    ],
                    [
                        'path' => '/result',
                        'name' => 'Result',
                        'component' => 'Layout',
                        'redirect' => '/result/success',
                        'meta' => [
                            'title' => 'menu.result.title',
                            'icon' => 'check-circle',
                        ],
                        'children' => [
                            [
                                'path' => 'success',
                                'name' => 'ResultSuccess',
                                'component' => '/result/success/index',
                                'meta' => [
                                    'title' => 'menu.result.success.title',
                                ],
                            ],
                            [
                                'path' => 'fail',
                                'name' => 'ResultFail',
                                'component' => '/result/fail/index',
                                'meta' => [
                                    'title' => 'menu.result.fail.title',
                                ],
                            ],
                            [
                                'path' => 'network-error',
                                'name' => 'ResultNetworkError',
                                'component' => '/result/network-error/index',
                                'meta' => [
                                    'title' => 'menu.result.networkError.title',
                                ],
                            ],
                            [
                                'path' => '403',
                                'name' => 'Result403',
                                'component' => '/result/403/index',
                                'meta' => [
                                    'title' => 'menu.result.403.title',
                                ],
                            ],
                            [
                                'path' => '404',
                                'name' => 'Result404',
                                'component' => '/result/404/index',
                                'meta' => [
                                    'title' => 'menu.result.404.title',
                                ],
                            ],
                            [
                                'path' => '500',
                                'name' => 'Result500',
                                'component' => '/result/500/index',
                                'meta' => [
                                    'title' => 'menu.result.500.title',
                                ],
                            ],
                            [
                                'path' => 'browser-incompatible',
                                'name' => 'ResultBrowserIncompatible',
                                'component' => '/result/browser-incompatible/index',
                                'meta' => [
                                    'title' => 'menu.result.browserIncompatible.title',
                                ],
                            ],
                            [
                                'path' => 'maintenance',
                                'name' => 'ResultMaintenance',
                                'component' => '/result/maintenance/index',
                                'meta' => [
                                    'title' => 'menu.result.maintenance.title',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }
}
