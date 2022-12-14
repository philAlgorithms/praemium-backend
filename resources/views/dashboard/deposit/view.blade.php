<x-layouts.dashboard :scripts=$scripts >
    <x-navigations.dashboard-sidebar />
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <x-navigations.topbar-pro colorState="dark">
            <x-general.dashboard-breadcrumb
            pageName="Deposits"
            pageTitle="Deposit History"
            color="dark"
            />
        </x-navigations.topbar-pro>
        <div class="container-fluid py-4">
            <div class="row">
                <x-cards.general-stat />
            </div>
            <div class="row">
                <x-tables.admin-deposits :deposits=$deposits />
            </div>
            <x-navigations.dashboard-footer />
        </div>
    </main>
</x-layouts.dashboard >
