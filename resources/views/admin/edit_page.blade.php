<!DOCTYPE html>
<html>
  <head> 
    
    <base href="/public">

    @include('admin.css')

    <style type="text/css">

        .post_title
        {

            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: white;

        }

        .div_deg
        {

            text-align: center;
            padding: 30px;

        }

        label
        {

            display: inline-block;
            width: 200px;

        }

        .img_deg
        {

            height: 150px;
            width: 150px;
            margin: auto;

        }

    </style>

  </head>
  <body>
    
    @include('admin.header')

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      
        @include('admin.sidebar')

      <!-- Sidebar Navigation end-->
      
      <div class="page-content">

        @if (session()->has('message'))

        <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

            {{session()->get('message')}}

        </div>
            
        @endif

        <h1 class="post_title">Edit Post</h1>

        <div>

            <form action="{{url('update_post', $post->id)}}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="div_deg">

                    <label>Post Title : </label>
                    <input type="text" name="title" value="{{$post->title}}">

                </div>
                <div class="div_deg">

                    <label style="vertical-align: top;">Post Description : </label>
                    <textarea name="description">{{$post->description}}</textarea>

                </div>
                <div >
                <div class="div_deg">

                  <label>Current Image : </label>
                  <img class="img_deg" src="/postimage/{{$post->image}}">

                </div>
                <div class="div_deg">

                    <label>Update Image : </label>
                    <input type="file" name="image">

                </div>
                <div class="div_deg">

                    <input type="submit" value="Update" class="btn btn-primary">

                </div>

            </form>

        </div>

      </div>

        @include('admin.footer')

  </body>
</html>