<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
    <base href="/public">

    @include('home.homecss')

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
            font-size: 18px;
            font-weight: bold;
            color: white;

        }

        .img_deg
        {

            height: 150px;
            width: 250px;
            margin: auto;

        }

    </style>

   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         
        @include('home.header')

         
      

      @if (session()->has('message'))

        <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

            {{session()->get('message')}}

        </div>
            
        @endif


        <div style="background-color: black;">

            <h1 class="post_title">Update Post</h1>

            <form action="{{url('update_post_data', $post->id)}}" method="POST" enctype="multipart/form-data">

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

                    <input type="submit" value="Update" class="btn btn-outline-secondary">

                </div>

            </form>

        </div>

      </div>
      
      @include('home.footer')

   </body>
</html>