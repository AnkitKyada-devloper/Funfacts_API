<!DOCTYPE html>
<html>

<head>
    <base target="_top">
</head>

<body>
    <div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
        <div style="margin:50px auto;width:80%;padding:20px 0">
            <div style="border-bottom:5px solid #eee">
            </div>
            <p>New Member in OpenEyes Family-{{$mailData['full_name']}} {{$mailData['designation']}}</p>
            <p style="font-size:15px">Hi Team,<br>
                I’d like to introduce {{$mailData['full_name']}}, joined our company on {{$mailData['date']}}, Today as
                {{$mailData['designation']}} .
                He will be working closely with Mihir Sir and development team on daily basis.
                {{$mailData['full_name']}} is pursuing B.Tech
                from Parul University- Vadodara. He is excited to test our new approach that will include him as a new
                {{$mailData['designation']}} in development department.
                To better understand him personally, we had a pop-quiz earlier. Please find the interesting facts about
                him in the attached PDF.
                <br>Welcome to the team, {{$mailData['full_name']}}!</br>
            </p>
            <h2
                style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">
            </h2>
            <p style="font-size:12px;">Thanks and Regards,<br>OpenEyes Software Solutions Pvt.Ltd.(OPC)<br>HR
                Recruiter-1<br>+91.997.881.EYES (3937)<br>
                +91.265.298.EYES (3937)<br><a href="http://www.theopeneyes.com/">www.TheOpenEyes.com</p>
        </div>
    </div>
</body>
</html>