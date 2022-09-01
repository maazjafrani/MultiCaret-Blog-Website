@extends('layouts.master')
@section('content')

    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <h2 class="tm-color-primary tm-post-title font-weight-bold">Login:</h2><br><br>
            <table>
                <form method="POST" action="/login">
                    @csrf
                    <tr>
                        <td>
                            <label class="col-sm-3 col-form-label text-right tm-color-primary font-weight-bold"
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
                        <td></td>
                        <td>
                            <div>
                                <button class="tm-btn tm-btn-primary tm-btn-small mt-5">Login</button>
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
