<div class="container container_responsive container-mobile">
    <div class="PageInfoBar indexPageInfo"  >
        <img class="GrayIcon" src="images/grayicon.png">
        <div class="OneWord" >LOJUXTA</div>
        <div class="BlueBar w-100 " style="background:  #67bfff;">
            <div class="blue_title">
                LEARNING RESOURCE
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="slideshow">
        <img src="images/indeximage.png" class="indeximage">
        <div class="slideshow-container">

            <div class="mySlides ">
                <div class="numbertext">1 / 3</div>
                <img src="images/info.png" style="width:100%; height: 100px">
                <div class="text">Caption Text</div>
            </div>

            <div class="mySlides ">
                <div class="numbertext">2 / 3</div>
                <img src="images/info.png" style="width:100%; height: 100px">
                <div class="text">Caption Two</div>
            </div>

            <div class="mySlides ">
                <div class="numbertext">3 / 3</div>
                <img src="images/info.png" style="width:100%; height: 100px">
                <div class="text">Caption Three</div>
            </div><br>

            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
            <div style="text-align:center" class="dots">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>
        </div>



    </div>

    @include('inc.blocks')
    <div class="welcomeTxt">
        <h2 class="welctxtBig">Welcome to our learning rescource</h2>
        <div class="nxt nxt 1mt-3">
            <img src="images/indexcamera.png" class="img"><h5 class="welctxt">NEW VIDEOS</h5>
        </div>
        <div class="nxt">
            <img src="images/indexcamera.png" class="img"><h5 class="welctxt">CONSULT ARTICLES</h5>
        </div>
        <div class="nxt nxt3">
            <img src="images/indexcamera.png" class="img"><h5 class="welctxt">DOWNLOAD POSTER SUMMARIES<small>... and so much more</small></h5>
        </div>
        <p class="p-2">Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vit</p>

    </div>
    <div class="imgBackground">
        <!-- <img src="https://via.placeholder.com/290x200" class="imgBackground">-->

        <div class="imgDiv">

            <div class="div1">
                <img src="images/indexcamera.png" class="img p-1"> <h6 class="ml-4">TEST YOUR KNOWLEDGE</h6>
            </div>
            <div class="div2">
                <h4 class="text-white">TAKE THE MULTIPLE CHOICE QUIZ TO TEST YOUR JNOWLEDGE</h4>
                <button class="btn btn-primary btnDownload">Start</button><button class="btn btn-light btnNext"> > </button>
            </div>
        </div>

    </div>
</div>