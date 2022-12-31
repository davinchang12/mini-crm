<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="inputFirstName" class="form-label" @error('firstname') is-invalid @enderror>First
                            Name</label>
                        <input type="text" class="form-control" name="firstname" id="inputFirstName"
                            value="{{ old('firstname', $employee->firstname) }}" required>
                        @error('firstname')
                            <span class="text-danger labelinput">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputLastName" class="form-label" @error('lastname') is-invalid @enderror>Last
                            Name</label>
                        <input type="text" class="form-control" name="lastname" id="inputLastName"
                            value="{{ old('lastname', $employee->lastname) }}" required>
                        @error('lastname')
                            <span class="text-danger labelinput">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="selectCompany" class="form-label">Company</label>
                        <select class="form-control" name="company_id" id="selectCompany">
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}" @if($company->id == $employee->company_id) selected @endif>{{ $company->name }}</option>
                            @endforeach
                        </select>
                        @error('company')
                            <span class="text-danger labelinput">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="inputEmail"
                            aria-describedby="emailHelp" value="{{ old('email', $employee->email) }}">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        @error('email')
                            <span class="text-danger labelinput">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputPhone" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" id="inputPhone"
                            value="{{ old('phone', $employee->phone) }}">
                        @error('phone')
                            <span class="text-danger labelinput">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color: #0d6efd;">Edit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
