@extends('layouts.master')
@section('content')

    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <h2 class="tm-color-primary tm-post-title font-weight-bold">Register:</h2><br><br>
            <table>
                <form method="Post" action="/register" enctype="multipart/form-data">
                    @csrf
                    <tr></tr>
                    <td><label class="col-sm-3 col-form-label text-right tm-color-primary font-weight-bold" for="name">
                            Name:
                        </label></td>
                    <td><input class="border p-2 w-full mt-3" type="text" name="name" id="name" required></td>


                    <tr>
                        <td><label class="col-sm-3 col-form-label text-right tm-color-primary font-weight-bold"
                                   for="email">
                                Email:
                            </label></td>
                        <td><input class="border p-2 w-full mt-3" type="text" name="email" id="email" required></td>

                    </tr>


                    <tr>
                        <td><label class="col-sm-3 col-form-label text-right tm-color-primary font-weight-bold"
                                   for="password">
                                Password:
                            </label></td>
                        <td><input class="border p-2 w-full mt-3" type="password" name="password" id="password"
                                   required></td>
                    </tr>
                    <tr>

                        <td><label
                                class="col-sm-3 col-form-label text-right tm-color-primary font-weight-bold form-label"
                                for="formFile"
                            >Profile Image:</label></td>
                        <td><input class="form-control" type="file" name="image" id="formFile"
                                   accept="image/png, image/gif, image/jpeg"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>

                            <div>
                                <button class="tm-btn tm-btn-primary tm-btn-small mt-5">Register</button>
                            </div>
                        </td>
                    </tr>
                    <tr>

                    @if($errors->any())

                        @foreach($errors->all() as $error)
                            <tr>
                                <td></td>
                                <td>
                                    <li style="color: red" class="tm-color-primary tm-color-gray">{{$error}}</li>
                                </td>
                            </tr>
                            @endforeach

                            @endif
                            </tr>


                </form>
            </table>
        </main>
    </section>

@endsection
