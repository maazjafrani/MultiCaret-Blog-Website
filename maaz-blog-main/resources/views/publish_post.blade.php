@extends('layouts.master')
@section('title','Posts')
@section('content')

    <section>

        <h2 class="tm-color-primary tm-post-title font-weight-bold">Publish New Post:</h2><br><br>
        <table>
            <form method="POST" action="/publish" enctype="multipart/form-data">
                @csrf

                <tr>
                    <td><label class="col-sm-3 col-form-label text-right tm-color-primary font-weight-bold"
                               for="content_name">Title</label></td>
                    <td><input class="border p-2 w-full" type="text" name="content_name" id="content_name" required>
                    </td>

                </tr>

                <tr>
                    <td><label class="col-sm-3 col-form-label text-right tm-color-primary font-weight-bold"
                               for="excerpt">Excerpt</label>
                    </td>
                    <td><input class="mt-3 border p-2 w-full" type="text" name="excerpt" id="excerpt" required></td>

                </tr>
                <tr class="mb-6">
                    <td><label class="col-sm-3 col-form-label text-right tm-color-primary font-weight-bold"
                               for="content">Content</label>
                    </td>
                    <td>
                        <label>

                                <textarea class="mt-3 block mb-2 text-uppercase font-weight-bold" name="content"
                                          required
                                ></textarea>
                        </label>

                    </td>

                </tr>

                <tr>
                    <td><label class="col-sm-3 col-form-label text-right tm-color-primary font-weight-bold"
                               for="category_id">Category</label>
                    </td>
                    <td><select class="mt-3" name="category_id">
                            @foreach($dataCategory as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        </select></td>

                </tr>
                <tr>
                    <td><label class="col-sm-3 col-form-label text-right tm-color-primary font-weight-bold"
                               for="tag_id">Tag</label></td>
                    <td><select class="mt-3" name="tag_id">
                            @foreach($dataTag as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        </select></td>

                </tr>
                <tr>
                    <td><label for="formFile"
                               class="col-sm-3 col-form-label text-right tm-color-primary font-weight-bold">Upload
                            Image:</label></td>
                    <td><input class="form-control mt-3" type="file" name="image" id="formFile"
                               accept="image/png, image/gif, image/jpeg"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" class="tm-btn tm-btn-primary tm-btn-small mt-5">Publish</button>
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
        <br><br><br><br><br>
    </section>

@endsection


