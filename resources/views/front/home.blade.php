<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AD1</title>
</head>
<body >
<img src="ad/1.jpg" alt="" style="height: 100%;width:100%;">
<div style="display:flex;justify-content: space-around;width:100%;margin-top: -42%;
    margin-left: 50px;">
<a href="mailto:copyli@barak-online.net.il">
    <img class="hover01" src="ad/button 1-01.png" alt="" style="height: 100%;width:80%;">
</a>
<a href="mailto:copyli@barak-online.net.il">
    <img class="hover01" src="ad/button 2-01.png" alt="" style="height: 100%;width:80%;">
</a>
</div>
</body>
</html>


<style>
    .hover01 {
        -webkit-transform: scale(1);
        transform: scale(1);
        -webkit-transition: .3s ease-in-out;
        transition: .3s ease-in-out;
    }

    .hover01:hover {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }
    /*margin:120px;*/
/*------------------------------------------
Responsive Grid Media Queries - 1280, 1024, 768, 480
1280-1024   - desktop (default grid)
 1024-768    - tablet landscape
768-480     - tablet
 480-less    - phone landscape & smaller
 --------------------------------------------*/
@media all and (min-width: 1024px) and (max-width: 1280px) {
    body{
        margin:120px;
    }
}

@media all and (min-width: 768px) and (max-width: 1024px) {
    body{
        margin:120px;
    }

}

@media all and (min-width: 480px) and (max-width: 768px) {
    body{
        margin:120px;
    }

}

@media all and (max-width: 480px) {
    body{
        margin:120px;
    }

}


/* Portrait */
@media screen and (orientation:portrait) { /* Portrait styles here */
    body{
        margin:120px;
    }

}
/* Landscape */
@media screen and (orientation:landscape) { /* Landscape styles here */
    body{
        margin:120px;
    }

}


/* CSS for iPhone, iPad, and Retina Displays */

/* Non-Retina */
@media screen and (-webkit-max-device-pixel-ratio: 1) {
    body{
        margin:120px;
    }
}

/* Retina */
@media only screen and (-webkit-min-device-pixel-ratio: 1.5),
only screen and (-o-min-device-pixel-ratio: 3/2),
only screen and (min--moz-device-pixel-ratio: 1.5),
only screen and (min-device-pixel-ratio: 1.5) {
    body{
        margin:0;
    }
}

/* iPhone Portrait */
 @media screen and (max-device-width: 480px) and (orientation:portrait) {
     body{
        margin:0;
    }
}

/* iPhone Landscape */
@media screen and (max-device-width: 480px) and (orientation:landscape) {
    body{
        margin:0;
    }
}

/* iPad Portrait */
@media screen and (min-device-width: 481px) and (orientation:portrait) {
    body{
        margin:0;
    }
}

 /* iPad Landscape */
@media screen and (min-device-width: 481px) and (orientation:landscape) {
    body{
        margin:120px;
    }
}


</style>
