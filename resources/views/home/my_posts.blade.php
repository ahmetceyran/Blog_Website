<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
    @include('home.homecss')

    <style type="text/css">
    
        .post_deg
        {
            text-align: center; 
            padding: 30px;
            background-color: black;
        }

        .title_deg
        {
            font-size: 30px;
            font-weight: bold;
            padding: 15px;
            color: white;
        }

        .des_deg
        {

            font-size: 18px;
            font-weight: bold;
            padding: 15px;
            color: white;

        }

        .img_deg
        {

            height: 200px;
            width: 300px;
            padding: 30px;
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

        @foreach ($data as $data)
         
        <div class="post_deg">
            
            <img class="img_deg" src="/postimage/{{$data->image}}">
           
            <h4 class="title_deg">{{$data->title}}</h4>

            <p class="des_deg">{{$data->description}}</p>

            <a onclick="return confirm('Are You Sure To Delete This Post?')" href="{{url('my_post_del', $data->id)}}" class="btn btn-danger">Delete</a>

         </div>

        @endforeach

      </div>
      
      
      @include('home.footer')

   </body>
</html>