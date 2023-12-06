<!DOCTYPE html>
<html>
  <head> 

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
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
            font-size: 15px; 
            color: white; 
            border: 1px solid; 
            width: 125px;

        }

        .table_deg
        {

            border: 1px solid white;
            width: %80;
            text-align: center;
            margin-left: 10px;

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

            <div class="alert alert-warning">

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
                    <th>Edit</th>
                    <th>Status Accept</th>
                    <th>Status Reject</th>

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

                        <a href="{{url('delete_post', $post->id)}}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>

                    </td>
                    <td>

                        <a href="{{url('edit_page', $post->id)}}" class="btn btn-warning">Edit</a>

                    </td>
                    <td>

                        <a onclick="return confirm('Are You Sure To Accept This Post?')" href="{{url('accept_post', $post->id)}}" class="btn btn-success">Accept</a>

                    </td>
                    <td>

                        <a onclick="return confirm('Are You Sure To Reject This Post?')" href="{{url('reject_post', $post->id)}}" class="btn btn-primary">Reject</a>

                    </td>

                </tr>

                @endforeach
                

            </table>

        </div>

        @include('admin.footer')

        <script type="text/javascript">

            function confirmation(ev)
            {

                ev.preventDefault();

                var urlToRedirect=ev.currentTarget.getAttribute('href');

                console.log(urlToRedirect);

                swal({

                    title : "Are You Sure to Delete This Post?",

                    text : "You won't be able to revert this delete!",

                    icon : "warning",

                    buttons : true,

                    dangerMode : true,

                })

                .then((willCancel)=>
                {

                    if(willCancel)
                    {

                        window.location.href = urlToRedirect;

                    }

                });

            }

        </script>

  </body>
</html>