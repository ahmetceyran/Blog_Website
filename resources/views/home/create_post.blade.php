<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
    @include('home.homecss')

    <style type="text/css">

        .maindiv_deg
        {

            text-align: center;

        }

        .post_title
        {

            font-size: 30px;
            font-weight: bold;
            padding: 20px;
            color: white;

        }

        .div_deg
        {

            text-align: center;
            padding: 20px;

        }

        label
        {

            display: inline-block;
            width: 200px;
            color: white;
            font-size: 18px;
            font-weight: bold;

        }

    </style>

   </head>
   <body>

        @include('sweetalert::alert')

      <!-- header section start -->
      <div class="header_section">
         
        @include('home.header')

        <div class="maindiv_deg">

            <h1 class="post_title">Create Post</h1>

            <form action="{{url('user_post')}}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="div_deg">

                    <label>Post Title : </label>
                    <input type="text" name="title">

                </div>
                <div class="div_deg">

                    <label style="vertical-align: top;">Post Description : </label>
                    <textarea name="description"></textarea>

                </div>
                <div class="div_deg">

                    <label>Add Image : </label>
                    <input type="file" name="image">

                </div>
                <div class="div_deg">

                    <input type="submit" value="Add Post" style="background-color: green;" class="btn btn-outline-secondary">

                </div>

            </form>

        </div>

      
      
      @include('home.footer')

   </body>
</html>