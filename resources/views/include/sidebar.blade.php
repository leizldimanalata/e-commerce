<button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar"
    aria-controls="sidebar-multi-level-sidebar" type="button"
    class="ms-3 mt-2 inline-flex items-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 sm:hidden dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
</button>

<aside id="sidebar-multi-level-sidebar"
    class="fixed left-0 top-0 z-40 h-screen w-64 -translate-x-full transition-transform sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full overflow-y-auto bg-blue-900 px-3 py-4">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('dashboard.dashboard') }}"
                    class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                    <span class="mdi mdi-view-dashboard"></span>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('products.index') }}"
                    class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                    <span class="mdi mdi-list-box-outline"></span>
                    <span class="ms-3 flex-1 whitespace-nowrap">Products</span>
                </a>
            </li>
            <li>
                <a href="#"
                    class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                    <span class="mdi mdi-account-group"></span>
                    <span class="ms-3 flex-1 whitespace-nowrap">Users</span>
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <div
                        class="group flex items-center rounded-lg px-2 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        <span class="mdi mdi-logout"></span>
                        <button type="submit" class="w-full p-2 text-left">Logout</button>
                    </div>
                </form>
            </li>
        </ul>
    </div>
</aside>