<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body
        {
        background-color: wheat;
        }
        li
        {
        list-style-type: none;
        margin-left: 1vw;
        }

        li:first-child
        {
        margin:0;
        }

        footer
        {
        padding-top: 5vh;
        padding-bottom: 2vh;
        }

        .content
        {
        height: 50vh;
        background-color: lightgray;
        }

        .container
        {
        background-color: beige;
        }

        .copyright, .impressum
        {
        text-align: center;
        }

        .logo
        {
        height: 8vh;
        }

        @media (max-width: 768px)
        {
        li
        {
        margin-left: 0;
        margin-bottom: 1vh;
        }

        .sozial
        {
        margin-bottom: 1vh;
        }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content"></div>
    <footer class="row">
        <div class="sozial col-xs-12 col-sm-6 col-sm-push-6">
            <ul class="row">
                <li class="col-xs-6 col-sm-2">
                    <a href="#">
                        <img class="logo"
                            src="https://cdn2.iconfinder.com/data/icons/black-white-social-media/32/online_social_media_facebook-128.png">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-2">
                    <a href="#">
                        <img class="logo"
                            src="https://cdn2.iconfinder.com/data/icons/black-white-social-media/32/twitter_online_social_media-128.png">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-2">
                    <a href="#">
                        <img class="logo"
                            src="https://cdn2.iconfinder.com/data/icons/black-white-social-media/32/instagram_online_social_media_photo-128.png">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-2">
                    <a href="#">
                        <img class="logo"
                            src="https://cdn2.iconfinder.com/data/icons/black-white-social-media/32/online_social_media_google_plus-128.png">
                    </a>
                </li>
            </ul>
        </div><!-- Ende Sozial media -->

        <div class="copyright col-xs-12 col-sm-3 col-sm-pull-6">
            <p> &copy; Me from now to eternity </p>
        </div><!-- Ende Copyright -->

        <div class="impressum col-xs-12 col-sm-3 col-sm-pull-6">
            <p> An impressive impressum </p>
            <p> Adresse und so </p>
        </div><!-- Ende Impressum -->
    </footer>
</div>
</body>
</html>
