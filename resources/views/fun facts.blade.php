<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
    body {
        margin: 0;
    }

    body div {
        font-family: "Calibri", sans-serif;
        font-size: 16px;
        color: #3a3a3a;
    }

    .header {
        overflow: hidden;
        background-color: #f1f1f1;
        padding: 20px;
        height: 65px;
        border: 1px solid #e7e7e7;
    }

    .logo {
        float: left;
    }

    .title {
        float: right;
        text-align: right;
    }

    .title h1 {
        margin: 13px 0 0 0;
    }

    .user-details {
        width: 100%;
        color: #3a3a3a;
        text-align: center;
        margin: 25px 0px;
    }

    .questions {
        background: #fff;
        padding: 25px;
        border: 1px solid #e7e7e7;
        box-shadow: rgb(0 0 0 / 5%) 0px 6px 24px 0px,
            rgb(0 0 0 / 8%) 0px 0px 0px 1px;
    }

    .questions h3 {
        margin-bottom: 10px;
        margin-top: 0;
    }

    .questions p {
        margin: 0;
        font-size: 14px;
        line-height: 22px;
    }
    </style>
</head>

<body>
    <div>
        <!-- Header Logo -->
        <div class="header">
            <div class="logo">
                <img alt="logo" src="https://theopeneyes.com/assets/images/logo-black.png" />
            </div>
            <div class="title">
                <h1>OpenEyes Funfacts</h1>
            </div>
        </div>
        <!-- User Details -->
        <div class="user-details">
            <strong>New Family Member </strong>
            <span style="margin: 20px 0px 7px 0px; display: block">
                <img alt="logo" src="{{ public_path('reports/'.$query->photo) }}" />
            </span>
            <strong>{{$query->full_name}}</strong>
            <span style="display: block; font-size: 14px; margin-top: 5px">{{$query->designation}}</span>
        </div>
        <div>
            <table cellspacing="0"
                style="margin: 0 auto; color: #3a3a3a; border-collapse:separate; border-spacing:15px; ">
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td class="questions">
                            <h3>{{$user->questions_id}}. {{$user->qustion_text }}</h3>
                            <p>
                                Answer: {{$user->answer_text}}
                            </p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
</body>

</html>