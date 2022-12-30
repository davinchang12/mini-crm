<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Companies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="inputName" class="form-label" @error('name') is-invalid @enderror>Name</label>
                        <input type="text" class="form-control" name="name" id="inputName"
                            value="{{ old('name') }}" required>
                        @error('name')
                            <span class="text-danger labelinput">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="inputEmail"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        @error('email')
                            <span class="text-danger labelinput">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputLogo" class="form-label">Logo</label><br>
                        <input type="file" name="logo" id="inputLogo"><br>
                        @error('logo')
                            <span class="text-danger labelinput">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputWebsite" class="form-label">Website</label>
                        <input type="text" class="form-control" name="website" id="inputWebsite">
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color: #0d6efd;">Create</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
