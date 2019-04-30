<?php

namespace Modules\Icda\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterIcdaSidebar implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    public function handle(BuildingSidebar $sidebar)
    {
        $sidebar->add($this->extendWith($sidebar->getMenu()));
    }

    /**
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('icda::common.icda'), function (Item $item) {
                $item->icon('fa fa-car');
                $item->weight(10);
                $item->authorize(
                    $this->auth->hasAccess('icda.vehicles.index')
                );
                $item->item(trans('icda::vehicles.title.vehicles'), function (Item $item) {
                    $item->icon('fa fa-car');
                    $item->weight(0);
                    $item->append('admin.icda.vehicles.create');
                    $item->route('admin.icda.vehicles.index');
                    $item->authorize(
                        $this->auth->hasAccess('icda.vehicles.index')
                    );
                });
                $item->item(trans('icda::inspections.title.inspections'), function (Item $item) {
                    $item->icon('fa fa-pencil-square-o');
                    $item->weight(0);
                    $item->append('admin.icda.inspections.create');
                    $item->route('admin.icda.inspections.index');
                    $item->authorize(
                        $this->auth->hasAccess('icda.inspections.index')
                    );
                });

                $item->item(trans('icda::vehicles.bulkload.title'), function (Item $item) {
                    $item->icon('fa fa-upload');
                    $item->weight(0);
                    $item->route('admin.icda.bulkload.index');
                    $item->authorize(
                        $this->auth->hasAccess('icda.bulkload.import')
                    );
                });
                // $item->item(trans('icda::brands.title.brands'), function (Item $item) {
                //     $item->icon('fa fa-copy');
                //     $item->weight(0);
                //     $item->append('admin.icda.brands.create');
                //     $item->route('admin.icda.brands.index');
                //     $item->authorize(
                //         $this->auth->hasAccess('icda.brands.index')
                //     );
                // });
                // $item->item(trans('icda::lines.title.lines'), function (Item $item) {
                //     $item->icon('fa fa-copy');
                //     $item->weight(0);
                //     $item->append('admin.icda.line.create');
                //     $item->route('admin.icda.line.index');
                //     $item->authorize(
                //         $this->auth->hasAccess('icda.lines.index')
                //     );
                // });
                // $item->item(trans('icda::colors.title.colors'), function (Item $item) {
                //     $item->icon('fa fa-copy');
                //     $item->weight(0);
                //     $item->append('admin.icda.color.create');
                //     $item->route('admin.icda.color.index');
                //     $item->authorize(
                //         $this->auth->hasAccess('icda.colors.index')
                //     );
                // });
// append




            });
        });

        return $menu;
    }
}
