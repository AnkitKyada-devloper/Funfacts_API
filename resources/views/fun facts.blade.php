<!DOCTYPE html>
<html>

<head>
    <title>Hi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    .container {
        margin-left: 5px;
        padding-top: 5px;
        float: center;

    }

    textarea {
        font-family: "Lucida Console", "Courier New", monospace;
        font-style: normal;
        font-size: 18px;
        margin-left: 5px;
        height: 30px;
        padding-top: -100px;
    }
    </style>
</head>

<body>
    <table class="container">
        <img src="{{storage_path('app\public\openeye.jfif')}}" style="width:120px;  marging-left:1px; padding-top:4px">

        <h1 align="center">New Family Member
            <br>
            <br>
            <img src="{{ public_path('reports/'.$query->photo ) }}" style="width:220px; height:220px; " >
            <br>
            {{$query->full_name}}
        </h1>
        @foreach($users as $user)
        <tr>
            <th align="left">
                <textarea>{{$user->id}}. {{$user->qustion_text }}
                </textarea>
                <p style="color:Red;"> <textarea>Ans.{{$user->answer_text}}</textarea></p>
            </th>
        <tr>
            @endforeach
    </table>
</body>

</html>