<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Companies
                </div>
                <div class="m-4">
                    <button type="button" class="btn btn-success" style="--bs-btn-color: #000;">Create new
                        company</button>
                    <div class="card mt-4 p-3">
                        <h5 class="card-title">Companies list</h5>
                        <hr>
                        <table class="table table-bordered p-5">
                            <thead>
                                <tr class="">
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Website</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="align-middle">Laravel Daily</td>
                                    <td class="align-middle">New York, New York</td>
                                    <td class="align-middle">www.laraveldaily.com</td>
                                    <td class="align-middle">povilas@laraveldaily.com</td>
                                    <td class="align-middle">
                                        <button type="button" class="btn btn-secondary" style="--bs-btn-color: #000;">Edit</button>
                                        <button type="button" class="btn btn-danger" style="--bs-btn-color: #000;">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
