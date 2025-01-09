<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $certificate->course_title }}</title>
    <style>
        body {
            margin: -43px -43px !important;
            padding: 0 !important;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body>
    @php
    $certificateImage = file_get_contents(asset('assets/image/certificate.png'));
    $base64Certificate = 'data:image/png;base64,' . base64_encode($certificateImage);
    @endphp

    <div style="text-align: center; position: absolute">
        <img src="{{ $base64Certificate }}" alt="" width="1118px" height="789px">
    </div>
    <div style="position: relative; text-align: center; color: #d4af37;">
        <h4 style="text-transform: uppercase; font-size: 2em; margin-top: 320px;">{{ $student->user->name }}</h4>
        <h3 style="margin-top: 90px; font-size: 1.5em">{{ $certificate->course_title }}</h3>
        <h6 style="margin-top: 17px; font-size: 1.3em; color: rgb(53, 53, 53); background-color: #fff; display: inline-block;">Date of Completion: {{ date('d M Y', strtotime($certificate->created_at)) }}</h6>
    </div>
</body>
</html>