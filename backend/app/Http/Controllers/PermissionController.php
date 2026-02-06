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
                            'title' => 'pages.dashboard.title',
                            'icon' => 'dashboard',
                        ],
                        'children' => [
                            [
                                'path' => 'base',
                                'name' => 'DashboardBase',
                                'component' => '/dashboard/base/index',
                                'meta' => [
                                    'title' => 'pages.dashboard.base.title',
                                ],
                            ],
                            [
                                'path' => 'detail',
                                'name' => 'DashboardDetail',
                                'component' => '/dashboard/detail/index',
                                'meta' => [
                                    'title' => 'pages.dashboard.detail.title',
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
                            'title' => 'pages.list.title',
                            'icon' => 'view-list',
                        ],
                        'children' => [
                            [
                                'path' => 'base',
                                'name' => 'ListBase',
                                'component' => '/list/base/index',
                                'meta' => [
                                    'title' => 'pages.list.base.title',
                                ],
                            ],
                            [
                                'path' => 'card',
                                'name' => 'ListCard',
                                'component' => '/list/card/index',
                                'meta' => [
                                    'title' => 'pages.list.card.title',
                                ],
                            ],
                            [
                                'path' => 'filter',
                                'name' => 'ListFilter',
                                'component' => '/list/filter/index',
                                'meta' => [
                                    'title' => 'pages.list.filter.title',
                                ],
                            ],
                            [
                                'path' => 'tree',
                                'name' => 'ListTree',
                                'component' => '/list/tree/index',
                                'meta' => [
                                    'title' => 'pages.list.tree.title',
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
                            'title' => 'pages.form.title',
                            'icon' => 'edit',
                        ],
                        'children' => [
                            [
                                'path' => 'base',
                                'name' => 'FormBase',
                                'component' => '/form/base/index',
                                'meta' => [
                                    'title' => 'pages.form.base.title',
                                ],
                            ],
                            [
                                'path' => 'step',
                                'name' => 'FormStep',
                                'component' => '/form/step/index',
                                'meta' => [
                                    'title' => 'pages.form.step.title',
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
                            'title' => 'pages.detail.title',
                            'icon' => 'layers',
                        ],
                        'children' => [
                            [
                                'path' => 'base',
                                'name' => 'DetailBase',
                                'component' => '/detail/base/index',
                                'meta' => [
                                    'title' => 'pages.detail.base.title',
                                ],
                            ],
                            [
                                'path' => 'advanced',
                                'name' => 'DetailAdvanced',
                                'component' => '/detail/advanced/index',
                                'meta' => [
                                    'title' => 'pages.detail.advanced.title',
                                ],
                            ],
                            [
                                'path' => 'deploy',
                                'name' => 'DetailDeploy',
                                'component' => '/detail/deploy/index',
                                'meta' => [
                                    'title' => 'pages.detail.deploy.title',
                                ],
                            ],
                            [
                                'path' => 'secondary',
                                'name' => 'DetailSecondary',
                                'component' => '/detail/secondary/index',
                                'meta' => [
                                    'title' => 'pages.detail.secondary.title',
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
                            'title' => 'pages.result.title',
                            'icon' => 'check-circle',
                        ],
                        'children' => [
                            [
                                'path' => 'success',
                                'name' => 'ResultSuccess',
                                'component' => '/result/success/index',
                                'meta' => [
                                    'title' => 'pages.result.success.title',
                                ],
                            ],
                            [
                                'path' => 'fail',
                                'name' => 'ResultFail',
                                'component' => '/result/fail/index',
                                'meta' => [
                                    'title' => 'pages.result.fail.title',
                                ],
                            ],
                            [
                                'path' => 'network-error',
                                'name' => 'ResultNetworkError',
                                'component' => '/result/network-error/index',
                                'meta' => [
                                    'title' => 'pages.result.networkError.title',
                                ],
                            ],
                            [
                                'path' => '403',
                                'name' => 'Result403',
                                'component' => '/result/403/index',
                                'meta' => [
                                    'title' => 'pages.result.403.title',
                                ],
                            ],
                            [
                                'path' => '404',
                                'name' => 'Result404',
                                'component' => '/result/404/index',
                                'meta' => [
                                    'title' => 'pages.result.404.title',
                                ],
                            ],
                            [
                                'path' => '500',
                                'name' => 'Result500',
                                'component' => '/result/500/index',
                                'meta' => [
                                    'title' => 'pages.result.500.title',
                                ],
                            ],
                            [
                                'path' => 'browser-incompatible',
                                'name' => 'ResultBrowserIncompatible',
                                'component' => '/result/browser-incompatible/index',
                                'meta' => [
                                    'title' => 'pages.result.browserIncompatible.title',
                                ],
                            ],
                            [
                                'path' => 'maintenance',
                                'name' => 'ResultMaintenance',
                                'component' => '/result/maintenance/index',
                                'meta' => [
                                    'title' => 'pages.result.maintenance.title',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }
}
