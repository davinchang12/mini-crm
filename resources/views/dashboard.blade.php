<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <div class="d-flex justify-content-between ps-2">
                        {{ Session::get('success') }}
                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Companies
                </div>
                <div class="m-4">
                    <a href="{{ route('companies.create') }}" class="btn btn-success">Create new
                        company</a>
                    @if (count($companiesData) > 0)
                        <div class="card mt-4 p-3">
                            <h5 class="card-title">Companies list</h5>
                            <hr>
                            <table class="table table-bordered p-5">
                                <thead>
                                    <tr class="">
                                        <th>Logo</th>
                                        <th>Name</th>
                                        <th>Website</th>
                                        <th>Email</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companiesData as $data)
                                        <tr>
                                            <td class="align-middle">
                                                @if ($data->logo)
                                                    <img src="{{ asset('storage/' . $data->logo) }}" alt=""
                                                        width="50" height="50">
                                                @endif
                                            </td>
                                            <td class="align-middle">{{ $data->name }}</td>
                                            <td class="align-middle">{{ $data->website == null ? '-' : $data->website }}
                                            </td>
                                            <td class="align-middle">{{ $data->email == null ? '-' : $data->email }}
                                            </td>
                                            <td class="align-middle">
                                                <a href="{{ route('companies.edit', $data->id) }}"
                                                    class="btn btn-secondary">Edit</a>
                                                <form action="{{ route('companies.destroy', $data->id) }}"
                                                    method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger"
                                                        style="--bs-btn-color: #000;">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Employees
                </div>
                <div class="m-4">
                    <a href="{{ route('employees.create') }}" class="btn btn-success">Add new
                        employee</a>
                    <div class="card mt-4 p-3">
                        <h5 class="card-title">Employees list</h5>
                        <hr>
                        <table class="table table-bordered p-5">
                            <thead>
                                <tr class="">
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Company</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="align-middle">Davin</td>
                                    <td class="align-middle">Chang</td>
                                    <td class="align-middle">Laravel Daily</td>
                                    <td class="align-middle">davinchang@davinchang.com</td>
                                    <td class="align-middle">xxxxxxxxx</td>
                                    <td class="align-middle">
                                        <button type="button" class="btn btn-secondary"
                                            style="--bs-btn-color: #000;">Edit</button>
                                        <button type="button" class="btn btn-danger"
                                            style="--bs-btn-color: #000;">Delete</button>
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
