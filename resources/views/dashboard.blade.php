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
                    @if (count($companies) > 0)
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
                                    @foreach ($companies as $company)
                                        <tr>
                                            <td class="align-middle">
                                                @if ($company->logo)
                                                    <img src="{{ asset('storage/' . $company->logo) }}" alt=""
                                                        width="50" height="50">
                                                @endif
                                            </td>
                                            <td class="align-middle">{{ $company->name }}</td>
                                            <td class="align-middle">
                                                {{ $company->website == null ? '-' : $company->website }}
                                            </td>
                                            <td class="align-middle">
                                                {{ $company->email == null ? '-' : $company->email }}
                                            </td>
                                            <td class="align-middle">
                                                <a href="{{ route('companies.edit', $company->id) }}"
                                                    class="btn btn-secondary">Edit</a>
                                                <form action="{{ route('companies.destroy', $company->id) }}"
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

    @if (count($companies) > 0)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        Employees
                    </div>
                    <div class="m-4">
                        <a href="{{ route('employees.create') }}" class="btn btn-success">Add new
                            employee</a>
                        @if (count($employees) > 0)
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
                                        @foreach ($employees as $employee)
                                            <tr>
                                                <td class="align-middle">{{ $employee->firstname }}</td>
                                                <td class="align-middle">{{ $employee->lastname }}</td>
                                                <td class="align-middle">{{ $employee->company->name }}</td>
                                                <td class="align-middle">{{ $employee->email ?? '-' }}</td>
                                                <td class="align-middle">{{ $employee->phone ?? '-' }}</td>
                                                <td class="align-middle">
                                                    <a href="{{ route('employees.edit', $employee->id) }}"
                                                        class="btn btn-secondary">Edit</a>
                                                    <form action="{{ route('employees.destroy', $employee->id) }}"
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
    @endif
</x-app-layout>
