<!DOCTYPE html>
<html>
  <head> 
    
    @include('admin.css')

    <style type="text/css">

        .title_deg
        {

            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: white;

        }

        th,td
        {

            padding: 10px; 
            font-size: 20px; 
            color: white; 
            border: 1px solid; 
            width: 125px;

        }

        .table_deg
        {

            border: 1px solid white;
            width: %80;
            text-align: center;
            margin-left: 70px;

        }

        .th_deg
        {

            background-color: grey;

        }

        .img_deg
        {

            height: 100px;
            width: 100px;

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

            <div class="alert alert-danger">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

            {{session()->get('message')}}

            </div>
            
            @endif

            <h1 class="title_deg">All Posts</h1>

            <table class="table_deg">

                <tr class="th_deg">

                    <th>Post Title</th>
                    <th>Description</th>
                    <th>Post By</th>
                    <th>Post Status</th>
                    <th>User Type</th>
                    <th>Image</th>
                    <th>Delete</th>

                </tr>

                @foreach ($post as $post)
                    
                <tr>

                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    <td>{{$post->name}}</td>
                    <td>{{$post->post_status}}</td>
                    <td>{{$post->usertype}}</td>
                    <td>
                        
                        <img class="img_deg" src="postimage/{{$post->image}}">

                    </td>
                    <td>

                        <a href="{{url('delete_post', $post->id)}}" class="btn btn-danger" onclick="return confirm('Are You Sure to Delete This Post?')">Delete</a>

                    </td>

                </tr>

                @endforeach
                

            </table>

        </div>

        @include('admin.footer')

  </body>
</html>