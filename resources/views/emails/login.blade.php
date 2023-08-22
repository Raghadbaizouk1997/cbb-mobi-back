

<!DOCTYPE html>
<html>

<head>
    <title>Register from new User</title>
</head>

<body>
    <center>
        <h2 style="padding: 23px;background: #b3deb8a1;border-bottom: 6px green solid;">
            <a href="">Hi Admin CBB MOBI COMPANY </a>
        </h2>

    </center>
     <h5>This Email to tell you in register from new user <h5>
    <p><strong>Full Name :  </strong>{{$dynamicData['full_name']}}</p>
    <br>
    <p><strong>Email :  </strong>{{$dynamicData['email']}}</p>
    <br>
    <p><strong>Mobile :  </strong>{{$dynamicData['mobile']}}</p>
    <br>
    <p><strong>Gender :  </strong>{{$dynamicData['gender']}}</p>
    <br>
    <p><strong>Birth Date :  </strong>{{$dynamicData['birth_date']}}</p>
    <br>
    <p><strong>Country :  </strong>{{$dynamicData['country']}}</p>
    <br>
    <p><strong>Bank Name :  </strong>{{$dynamicData['bank_name']}}</p>
    <br>
    <p><strong>Bank Account :  </strong>{{$dynamicData['bank_account']}}</p>
    <br>
    <p><strong>Front Face Image Identity :  </strong><img src={{$dynamicData['front_image']}} alt="identity image" width="100px" height="100px"/></p>
    <br>
    <p><strong>Back Face Image Identity :  </strong><img src={{$dynamicData['back_image']}} alt="identity image"width="100px" height="100px"/></p>
    <br>
   
    <strong>Thank you . :)</strong>
</body>

</html>