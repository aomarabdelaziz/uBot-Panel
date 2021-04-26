<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <title>uBot | Documentation</title>

    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href=" {{ asset('fonts/font-awesome-4.3.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stroke.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/prettyPhoto.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('js/syntax-highlighter/styles/shCore.css') }}" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('js/syntax-highlighter/styles/shThemeRDark.css') }}" media="all">

    <!-- CUSTOM -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-chevron-up" aria-hidden="true"></i></button>

<script>
    var mybutton = document.getElementById("myBtn");
    window.onscroll = function() {scrollFunction()};
    function scrollFunction() {
        if (document.body.scrollTop > 1000 || document.documentElement.scrollTop > 1000) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }
    function topFunction() {
        window.scrollTo({ top: 0, behavior: 'smooth' })
        document.documentElement.scrollTo({ top: 0, behavior: 'smooth' })
    }

    document.addEventListener("DOMContentLoaded", () => {
        document.querySelector('html').classList.toggle('dark');
    });



</script>

<div id="wrapper">

    <div id="mode" >
        <div class="dark">
            <svg aria-hidden="true" viewBox="0 0 512 512">
                <title>lightmode</title>
                <path fill="currentColor" d="M256 160c-52.9 0-96 43.1-96 96s43.1 96 96 96 96-43.1 96-96-43.1-96-96-96zm246.4 80.5l-94.7-47.3 33.5-100.4c4.5-13.6-8.4-26.5-21.9-21.9l-100.4 33.5-47.4-94.8c-6.4-12.8-24.6-12.8-31 0l-47.3 94.7L92.7 70.8c-13.6-4.5-26.5 8.4-21.9 21.9l33.5 100.4-94.7 47.4c-12.8 6.4-12.8 24.6 0 31l94.7 47.3-33.5 100.5c-4.5 13.6 8.4 26.5 21.9 21.9l100.4-33.5 47.3 94.7c6.4 12.8 24.6 12.8 31 0l47.3-94.7 100.4 33.5c13.6 4.5 26.5-8.4 21.9-21.9l-33.5-100.4 94.7-47.3c13-6.5 13-24.7.2-31.1zm-155.9 106c-49.9 49.9-131.1 49.9-181 0-49.9-49.9-49.9-131.1 0-181 49.9-49.9 131.1-49.9 181 0 49.9 49.9 49.9 131.1 0 181z"></path>
            </svg>
        </div>
        <div class="light">
            <svg aria-hidden="true" viewBox="0 0 512 512">
                <title>darkmode</title>
                <path fill="currentColor" d="M283.211 512c78.962 0 151.079-35.925 198.857-94.792 7.068-8.708-.639-21.43-11.562-19.35-124.203 23.654-238.262-71.576-238.262-196.954 0-72.222 38.662-138.635 101.498-174.394 9.686-5.512 7.25-20.197-3.756-22.23A258.156 258.156 0 0 0 283.211 0c-141.309 0-256 114.511-256 256 0 141.309 114.511 256 256 256z"></path>
            </svg>
        </div>
    </div>

    <div class="container">

        <section id="top" class="section docs-heading">

            <div class="row">
                <div class="col-md-12">
                    <div class="big-title text-center">
                        <h1>uBot Documentation</h1>
                        <p class="lead">Your uBot documentation version 1.7</p>
                    </div>
                    <!-- end title -->
                </div>
                <!-- end 12 -->
            </div>
            <!-- end row -->

            <hr>

        </section>
        <!-- end section -->

        <div class="row">
            <div class="col-md-3">
                <nav class="docs-sidebar" data-spy="affix" data-offset-top="300" data-offset-bottom="200" role="navigation">
                    <ul class="nav">
                        <li><a href="#line1">Getting Started</a></li>
                        <li><a href="#line2">How to Install uBot</a></li>
                        <li><a href="#line3">Integration With MaxiGuard</a></li>
                        <li><a href="#line4">uBot Events</a>
                            <ul class="nav">
                                <li><a href="#line4_1">Questions And Answers</a></li>
                                <li><a href="#line4_2">Lucky Store</a></li>
                                <li><a href="#line4_3">Lucky Party Number</a></li>
                                <li><a href="#line4_4">Lucky Party Member</a></li>
                                <li><a href="#line4_5">Lottery Events</a></li>
                                <li><a href="#line4_6">Madness</a></li>
                                <li><a href="#line4_7">Uniques</a></li>
                                <li><a href="#line4_8">PVP</a></li>
                                <li><a href="#line4_9">Search Events</a></li>
                                <li><a href="#line4_10">Drunk</a></li>
                                <li><a href="#line4_11">GM Killer</a></li>
                                <li><a href="#line4_12">Alchemy</a></li>
                                <li><a href="#line4_13">Random Action</a></li>



                            </ul>
                        </li>
                        <li><a href="#line6">uBot Procedures</a>
                            <ul class="nav">
                                <li><a href="#line6_1">_AddEventSchedule</a></li>
                                <li><a href="#line6_2">_CheckAvatarSlot</a></li>
                                <li><a href="#line6_3">_CheckDC</a></li>
                                <li><a href="#line6_4">_CheckItemSlot</a></li>
                                <li><a href="#line6_5">_CheckJob</a></li>
                                <li><a href="#line6_6">_CheckPK</a></li>
                                <li><a href="#line6_7">_ChecReqLevel</a></li>
                                <li><a href="#line6_8">_ExecReward</a></li>
                                <li><a href="#line6_9">_FetchKills</a></li>
                                <li><a href="#line6_10">_GetHWIDIP</a></li>
                                <li><a href="#line6_11">_Init</a></li>
                                <li><a href="#line6_12">_Lottery</a></li>
                                <li><a href="#line6_13">_IncreaseKillCount</a></li>
                                <li><a href="#line6_14">_NoticeControl</a></li>
                                <li><a href="#line6_15">_OnEventStart</a></li>
                                <li><a href="#line6_16">_OnEventEnd</a></li>




                            </ul>
                        </li>
                        <li><a href="#line8">Support Desk</a></li>
                        <li><a href="#line9">Version History (Changelog)</a></li>
                        <li><a href="#line10">Copyright and license</a></li>
                    </ul>
                </nav >
            </div>
            <div class="col-md-9">

                <section class="welcome">
                    <div class="row">
                        <div class="col-md-12 left-align">
                            <h2 class="dark-text">Introduction<hr></h2>
                            <div class="row">

                                <div class="col-md-12 full">
                                    <div class="intro1">
                                        <ul>
                                            <li><strong>Bot Name : </strong>uBot Automatic Events</li>
                                            <li><strong>Bot Version : </strong> v 1.7</li>
                                            <li><strong>Author  : </strong> <a href="https://www.facebook.com/Abdelaziz.Omar93/" target="_blank">Abdelaziz Omar</a></li>
                                            <li><strong>Discord Server : </strong> <a href="https://discord.gg/eGhKUQfWkU" target="_blank">https://discord.gg/eGhKUQfWkU</a></li>
                                            <li><strong>License : </strong> <a href="#" target="_blank">Un License</a></li>
                                        </ul>
                                    </div>

                                    <hr>
                                    <div>
                                        <p>First of all, Thank you so much for purchasing my bot and for being my loyal customer.
                                            <strong>You are awesome!</strong>
                                            <br> You are entitled to get free lifetime updates to this product + exceptional support from the developer directly.
                                        </p>

                                        <p>This documentation is to help you regarding each step of customization.
                                            Please go through the documentation carefully to understand how this bot is work and how to edit the configurations properly. basic <strong>Brain.exe</strong> is
                                            required to configurate the bot. </p>

                                        <h4>Requirements</h4>
                                        <p>You will need the following sofwares to configurate the bot.</p>
                                        <ol>
                                            <li>Microsoft SQL SERVER </li>
                                            <li>Web Browser to configurate (eg: Google Chrome or Mozilla Firefox)</li>
                                            <li>Don't forget <strong>Brain.exe</strong> </li>
                                        </ol>
                                        <div class="intro2 clearfix">
                                            <p><i class="fa fa-exclamation-triangle"></i> Be careful while editing the bot settings. If not edited properly, the bot may break completely.
                                                <br> Don't panic there is a support is provided for faulty customization.
                                            </p>
                                        </div>

                                        <hr>
                                        <h4>Features</h4>
                                        <ol>
                                            <li>Cheap <strong>25$</strong> per month</li>
                                            <li>uBot contains <strong>28</strong> event</li>
                                            <li>uBot <strong>MaxiGuard</strong> filter integration , to allow you to customize more interesting things</li>
                                            <li>Auto Relog</li>
                                            <li>Discord Weebhook</li>
                                            <li>Fully control of different settings <strong>Rounds , Limits include(HWID/IP) , Delays , Rewards , Notices , log , etc...</strong></li>
                                            <li>More features will be introduced at <a href="#">events</a> section</li>
                                        </ol>
                                        <div class="intro2 clearfix">
                                            <p><i class="fa fa-info"></i> If you a MaxiGuard user , you are lucky , you can learn how to integrate uBot with the filter at filter integration section
                                            </p>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </section>

                <section id="line1" class="section">

                    <div class="row">
                        <div class="col-md-12 left-align">
                            <h2 class="dark-text">Getting Started <hr></h2>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-md-12">
                            <h4>Normal uBot Database</h4>
                            <p>You will need one of the following uBot.bak database or uBot.script to configurate the bot.</p>
                            <ol>
                                <li><a href="">Database</a></li>
                                <li><a href="$">Script</a></li>
                                <li>Don't forget <strong>Brain.exe</strong> </li>
                            </ol>

                            <h4>uBot Database With MaxiGuard filter</h4>
                            <p>You will need one of the following uBot.bak database or uBot.script to configurate the bot with <strong>MaxiGuard Filter</strong>.</p>
                            <ol>
                                <li><a href="">Database</a></li>
                                <li><a href="$">Script</a></li>
                                <li>Also don't forget <strong>Brain.exe</strong> </li>
                            </ol>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                </section>
                <!-- end section -->

                <section id="line2" class="section">

                    <div class="row">
                        <div class="col-md-12 left-align">
                            <h2 class="dark-text">How to Install uBot <hr></h2>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="intro2 clearfix">
                        <p><i class="fa fa-warning"></i> Be careful while you install the bot.
                        <p>You must forwded this ip to your firewall / filter (127.0.0.1) </p>
                    </div>

                    <hr>

                    <h4>After you finished your first step of installation</h4>
                    <h4>Watch this video installation</h4>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="media">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/snFzbPm_RUE" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>

                    </div>

                </section>
                <!-- end section -->

                <section id="line3" class="section">

                    <div class="row">
                        <div class="col-md-12 left-align">
                            <h2 class="dark-text">Integration with MaxiGuad Filter <hr></h2>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <h4>Install uBot with MaxiGuard Filter</h4>

                    <p>Let me to inform you that uBot can integrate with maxiguard to give you an experince to control the events with your server <br>
                    <ol>
                        <li>Kill Counter</li>
                        <li>Timer</li>
                        <li>Notices, Global color</li>
                        <li>And more you will discover this features with your self at the end of the documentation , it's a <strong>Surpise!!</strong></li>
                    </ol>
                    </p>






                </section>
                <!-- end section -->


                <section id="line4" class="section">

                    <div class="row">
                        <div class="col-md-12 left-align">
                            <h2 class="dark-text">uBot Events Features<hr></h2>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">


                        <div class="col-md-8">
                            <h4 id="line4_1">Questons and Answers Events </h4>
                            <p>  <strong>1. Trivia</strong> It's an event that requires an interpretation and distinguishing skills, The bot will write a notice asking
                                a question, and the players have to pm BOT with the correct answer, of course the fastest player will be the winner.</p>
                            <hr>
                            <p> <strong>2. Choose</strong> It's an event that requires an interpretation and distinguishing skills, The bot will write a notice asking a question with some multiple choices, and the players have to pm BOT with the correct answer, ofcourse the fastest message will be the winner.</p>
                            <hr>
                            <p> <strong>3. Viceversa</strong> It's an event that requires an interpretation and distinguishing skills, The bot will write a random word and you have to capitalize the small letters and smallize the capital letters as <a href="#">example the word (ReAsOnAbLe) the correct answer of it is (rEaSoNaBlE)</a> and opposite</p>
                            <hr>
                            <p> <strong>4. Convert The Word</strong> It's an event that requires an interpretation and distinguishing skills, The bot will write a random word and you have to convert it from/to capital/small as <a href="#">example of the word (reasonable) the correct answer of it is (REASONABLE)</a> and opposite</p>
                            <hr>
                            <p> <strong>5. Reverse The Word</strong> It's an event that requires an interpretation and distinguishing skills, The bot will write a random combination of letters and you have to make up a correct word of those letters as <a href="#">example (butoa) the correct answer word of it is (about)</a></p>
                            <p> <strong>6. Re-Arrange the letters</strong> It's an event that requires an interpretation and distinguishing skills, The bot will write a random word and you have to reverse the letters arrangement as a <a href="#">example (reasonable) the correct word is (elbanosaer).</a></p>




                            <h1>Event Features</h1>
                            <ol>
                                <li>Contains (Trivia , Choose , Viceversa , Convert , Reverse , ReArrange) events</li>
                                <li>Unlimted Rounds</li>
                                <li>Able to send the answer of the question after the question is <strong>answred</strong></li>
                                <li><strong>Winner limitaion: </strong> You can prevent player to participate at the event , if he had exceed the limit of win </li>
                                <li><strong>Incorrect answer limitation:</strong> You can prevent player from answering anymore , if he had exceed the number of incorrect answer </li>
                                <li><strong>PC Limitation: </strong>You can prevent same PC (HWID/IP) to participate at the event</li>
                            </ol>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <hr>

                    <div class="row">


                        <div class="col-md-8">
                            <h4 id="line4_2"> Lucky Store Events </h4>
                            <p>
                                <strong>7. Lucky PM</strong> In this event, the bot will start a notice/global to announce the start of the event. To participate in the event all you have to do is to
                                send a random message to the bot, the bot will register you automatically,
                                and when the event ends, the bot will announce the winner and give him the reward.

                            <hr>

                            <strong>8. Lucky Global</strong> In this event, the bot will start a notice/global to announce the start of the event. To participate in the event all you have to do is to send
                            a random message in a global chat, the bot will register you automatically, and when the event ends, the bot will announce the winner and give him the reward.

                            <hr>

                            <strong>9. Lucky Staller</strong> In this event, the bot will start a notice/global to announce the start of the event. To participate in the event all you have to do is to open a stall nearby to the bot , the bot will register you automatically, and when the event ends, the bot will announce the winner and give him the reward.
                            </p>
                            <h1>Event Features</h1>
                            <ol>
                                <li>Contains (Lucky PM , Lucky Global , Lucky Staller) events</li>
                                <li>Unlimted Rounds</li>
                                <li><strong>Winner limitaion: </strong> You can prevent player to participate at the event , if he had exceed the limit of win </li>
                                <li><strong>PC Limitation: </strong>You can prevent same PC (HWID/IP) to participate at the event</li>
                            </ol>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <hr>

                    <div class="row">


                        <div class="col-md-8">
                            <h4 id="line4_3">10. LPN (Lucky Party Number) </h4>
                            <p>
                                The event is totally based on calculation and luck, the bot is going to write a specific number, and you have to create parties insanely until you reach the required number, the one that has the desired party's number will be the winner.
                            </p>

                            <h1>Event Features</h1>
                            <ol>
                                <li>Unlimted Rounds</li>
                            </ol>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <hr>

                    <div class="row">


                        <div class="col-md-8">

                            <h4 id="line4_4">11. Lucky Party Member </h4>
                            <p>
                                The event is totally based on luck, the bot is going to create a party matching with a specific number, and you have to join the bot party, and the bot will choose one of members randomly to be the winner.
                            </p>
                            <h1>Event Features</h1>
                            <ol>
                                <li>Unlimted Rounds</li>
                                <li><strong>Winner limitaion: </strong> You can prevent player to participate at the event , if he had exceed the limit of win </li>
                                <li><strong>PC Limitation: </strong>You can prevent same PC (HWID/IP) to participate at the event</li>
                            </ol>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <hr>

                    <div class="row">


                        <div class="col-md-8">

                            <h4 id="line4_4">12. Lucky Critical</h4>
                            <p>
                                This event is totaly brings alot of fun, the bot will start a notice/global to announce the start of the event to participate at the event you have to a send a register key to the bot, after that the bot will recall all registered players to x region, and check if all players wear a white cape and unwear all items, then the bot will start hiting all registered player who will recieve a critical will be kicked out , also who will wear anything during the event or moved away will kicked out xD!
                            </p>
                            <h1>Event Features</h1>
                            <ol>
                                <li>Registration with <strong>/reg</strong> key</li>
                                <li>Min & Max players can be participate</li>
                                <li>Cape Detection <strong>If you have a filter can auto cape the players at region enable this feature from filter and disable it from the bot</strong></li>
                                <li><strong>PC Limitation: </strong>You can prevent same PC (HWID/IP) to participate at the event</li>
                            </ol>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <hr>

                    <div class="row">

                        <h4 id="line4_5">Lottery Events</h4>
                        <p>
                            <strong>13. Lottery Silk </strong>this event the bot will start saying send register to me to register in the lottery and start gathering silk from people who registered then picks a random one and give him all the silk he gathered, of course the player can cancel his registeration and return back his silk but in the registeration perion only.

                        </p>
                        <hr>
                        <p>
                            <strong>14. Lottery Coins </strong> in this event the bot will start saying send register to me to register in the lottery and start gathering coins from people who registered then picks a random one and give him all the coins he gathered, of course the player can cancel his registeration and return back his coins but in the registeration perion only.

                        </p>
                        <hr>
                        <p>
                            <strong>15. Lottery Gold </strong>n this event the bot will start saying send register to me to register in the lottery and start gathering gold from people who registered then picks a random one and give him all the gold he gathered, of course the player can cancel his registeration and return back his gold but in the registeration perion only.

                        </p>
                        <h1>Event Features</h1>
                        <ol>
                            <li>Contains (Lottery Silk , Lottery Gold , Lottery Coins) events</li>
                            <li>Unlimted Rounds</li>
                            <li>Registration with <strong>/reg</strong> key</li>
                            <li>Min & Max players can be participate</li>
                            <li>Lottery amount registration</li>
                            <li><strong>PC Limitation: </strong>You can prevent same PC (HWID/IP) to participate at the event</li>
                        </ol>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <hr>

                    <div class="row">


                        <div class="col-md-8">

                            <h4 id="line4_6">16. Madness</h4>
                            <p>
                                In this event the bot will go to x region and he will start a notice/global to announce the start of the event to participate at the event you have to send a register key to the bot,after that he will recall all registered players to the x region ofcourse who will in job time and in pk time will be not recalled, the players have to wear a cape and start kill the unique that will be spawned the first who will kill the unique he will be the winner                                </p>
                            <h1>Event Features</h1>
                            <ol>
                                <li>Registration with <strong>/reg</strong> key</li>
                                <li>Min & Max players can be participate</li>
                                <li>Required level to  can be participate</li>
                                <li>Able to set a uniqueID to be spawn</li>
                                <li>Cape Detection <strong>If you have a filter can auto cape the players at region enable this feature from filter and disable it from the bot</strong></li>
                                <li><strong>PC Limitation: </strong>You can prevent same PC (HWID/IP) to participate at the event</li>
                            </ol>
                        </div>
                        <!-- end col -->
                    </div>

                    <div class="row">


                        <div class="col-md-8">

                            <h4 id="line4_7">17. Uniques</h4>
                            <p>
                                In this event the bot will go to x region and will start a spawn a sequance of uniques , who will get higher points he will be the winner
                            <h1>Event Features</h1>
                            <ol>
                                <li>Able to set Priority of spawned uniques</li>
                                <li>Able to set count , delay of each unique</li>
                                <li>Able to set a points for each unique</li>
                            </ol>
                        </div>
                        <!-- end col -->
                    </div>

                    <div class="row">


                        <div class="col-md-8">

                            <h4 id="line4_8">PVP Events</h4>
                            <p>
                                <strong>18. LMS </strong> LMS (Last Man Standing) event means that AutoEvent will start saying that LMS event is starting in XXX (XXX is time) and to register send a pm to BOT with Register, you get teleported and start killing other players, the one lasts to the end wins.
                            </p>
                            <hr>
                            <p>
                                <strong>19. Survival </strong> Survival arena is one of the most intense events in Silkroad, you will be able to fight against other players, the bot will announce the start of the event, all you have to do it send PM to the bot to register at the event, when the survival arena starts, the bot will recall you all. You will find a timer countdown in the screen shows how much time left. The player who get the most kills will be the winner.
                            </p>
                            <hr>

                            <p>
                                <strong>20. PVP</strong> PVP is one of the most intense events in Silkroad, you will be able to fight against other players (1 VS 1) , until one will be remaining and he will be the winner
                            </p>
                            <hr>
                            <p>
                                <strong>21. STR PVP </strong> As the same of PVP event but for str players only
                            </p>
                            <hr>
                            <p>
                                <strong>22. INT PVP </strong> As the same of PVP event but for int players only
                            </p>

                            <h1>Event Features</h1>
                            <ol>
                                <li>Registration with <strong>/reg</strong> key</li>
                                <li>Min & Max players can be participate</li>
                                <li>Required level to  can be participate</li>
                                <li>PlayMethod (Cape, PK) for LMS event only</li>
                                <li>Cape Detection <strong>If you have a filter can auto cape the players at region enable this feature from filter and disable it from the bot</strong></li>
                                <li><strong>PC Limitation: </strong>You can prevent same PC (HWID/IP) to participate at the event</li>
                                <li>Prevent player to earn more poins from same player for a time (Survival event only)</li>
                                <li>Prevent player to earn more poitns from same player if he killed him to much (Survival event only)</li>
                                <li>The ability to finish the event by poins (Survival event only)</li>
                            </ol>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">


                        <div class="col-md-8">
                            <h4 id="line4_9">Search Events </h4>
                            <p> <strong>23. Hide And Seek</strong> An old event which has a great taste of using your intuition, The bot is going to hide and he will ask you to find them, It will reveal some details(hints) about it's location , and you will have to know where is the bot hidden, the first one that exchange him will will be the winner.</p>
                            <hr>
                            <p> <strong>24. Search And Destroy</strong> An old event which has a great taste of using your intuition, The bot is going to hide and spawn certain unique and he will ask you to find the him, It will reveal some details(hints) about it's location , and you will have to know where is the unique location, the first one that kill the unique will be the winner. </p>
                            <hr>
                            <p> <strong>25. Stall </strong>An old event which has a great taste of using your intuition, The bot is going to hide and open a stall with an item and he will ask you to find the him, It will reveal some details(hints) about it's location , and you will have to know where is the bot location, the first one that buy the item from the stall will be the winner.</p>

                            <h1>Event Features</h1>
                            <ol>
                                <li>Contains (Hide And Seek , Search And Destroy , Stall) events</li>
                                <li>Unlimted Rounds</li>
                                <li>Able to send the answer of the question after the question is <strong>answred</strong></li>
                                <li><strong>Winner limitaion: </strong> You can prevent player to participate at the event , if he had exceed the limit of win (HnS Only) </li>
                            </ol>
                        </div>
                        <!-- end col -->
                    </div>

                    <div class="row">


                        <div class="col-md-8">
                            <h4 id="line4_10">26. Drunk Event </h4>
                            <p>
                                The bot will recall all players to x region , then will spawn a strong unique will kill the players with one hit , the players have to run the last one will be the winner
                            </p>


                            <h1>Event Features</h1>
                            <ol>
                                <li>Registration with <strong>/reg</strong> key</li>
                                <li>Min & Max players can be participate</li>
                                <li>Required level to  can be participate</li>
                                <li><strong>PC Limitation: </strong>You can prevent same PC (HWID/IP) to participate at the event</li>
                            </ol>
                        </div>
                        <!-- end col -->
                    </div>

                    <div class="row">


                        <div class="col-md-8">
                            <h4 id="line4_11">27. GMKiller Event </h4>
                            <p>
                                You are not called for registering in this event, The event will take place at x region, You have to run there as soon as you see the notice that will be written by our bot, the bot is going to appear and will be in PK Mode, you got to sorely attack the BOT that appears in order to kill him as fast as possible, once he is dead, the bot is going to announce the wage earner.
                            </p>


                            <h1>Event Features</h1>
                            <ol>
                                <li>Unlimted rounds</li>
                                <li>Bot can recover his hp before every round</li>
                            </ol>
                        </div>
                        <!-- end col -->
                    </div>

                    <div class="row">


                        <div class="col-md-8">
                            <h4 id="line4_12">28. Alchemy Event </h4>
                            <p>
                                It is an event where everything is based on your fortune, a lot of players like to try their luck, so we have made an event that provides a fantastic challenge that proves your luck and enchanting skill, Our bot will write an announcement as soon as the event begins, the event will be held with 4 rounds only each round with a different item (Wep,Shield,Acc,Pro) then start attempting to enchant the item that you are required to enchant, the one that gets the wanted enchantment level first will be announced as the fastest one to fulfill the event's request and that player will be the winner.
                            </p>


                            <h1>Event Features</h1>
                            <ol>

                            </ol>
                        </div>
                        <!-- end col -->
                    </div>

                    <div class="row">


                        <div class="col-md-8">
                            <h4 id="line4_13">29. Random Action Event </h4>
                            <p>
                                In this event the bot will go to x region and will start order the players to do something who will do it fisrt will be the winner

                            </p>


                            <h1>Event Features</h1>
                            <ol>

                            </ol>
                        </div>
                        <!-- end col -->
                    </div>

                </section>
                <!-- end section -->

                <section id="line6" class="section">


                    <div class="row">
                        <div class="col-md-12 left-align">
                            <h2 class="dark-text">uBot Procedures<hr></h2>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">


                        <div class="col-md-8">
                            <h4 id="line6_1"> _AddEventSchedule </h4>
                            <p>
                                This procedure is able to add an event schedule manually
                            </p>





                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">


                        <div class="col-md-8">
                            <h4 id="line6_2"> _CheckAvatarSlot </h4>
                            <p>
                                This procedure is responsible for check if the character is wearing any avatar or not for Lucky Critical Event (aslo you can change the return message)
                            </p>

                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">


                        <div class="col-md-8">
                            <h4 id="line6_3"> _CheckDC </h4>
                            <p>
                                This procedure is responsible for check if the character is disconnectd or not
                            </p>

                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">


                        <div class="col-md-8">
                            <h4 id="line6_4"> _CheckItemSlot </h4>
                            <p>
                                This procedure is responsible for check if the character is wearing anyitem or not for Lucky Critical Event (aslo you can change the return message)
                            </p>

                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">


                        <div class="col-md-8">
                            <h4 id="line6_5"> _CheckJob </h4>
                            <p>
                                This procedure is responsible for check if the player is in jobtime or not before event registration ( also you can change the returned message)
                            </p>

                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">


                        <div class="col-md-8">
                            <h4 id="line6_6"> _CheckPK </h4>
                            <p>
                                This procedure is responsible for check if the player is in pk or not before event registration ( also you can change the returned message)
                            </p>

                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">


                        <div class="col-md-8">
                            <h4 id="line6_7"> _ChecReqLevel </h4>
                            <p>
                                This procedure is responsible for check the required level for the charname before the event registration (aslo you can change the returned message)
                            </p>

                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">


                        <div class="col-md-8">
                            <h4 id="line6_8"> _ExecReward </h4>
                            <p>
                                This procedure is responsible for giving the players the rewards and log it into the table to make sure that the player got the reward
                            </p>

                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">


                        <div class="col-md-8">
                            <h4 id="line6_9"> _FetchKills </h4>
                            <p>
                                This procedure is responsible for log all kills in events (LMS , SURVIVAL , PVP , GMKiller , Drunk)
                            </p>

                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">


                        <div class="col-md-8">
                            <h4 id="line6_10"> _GetHWIDIP </h4>
                            <p>
                                This procedure is responsible for return the HWID/IP for the charname if your filter is provide this feature , to prevent duplicate PC/IP players to participate at the event
                            </p>

                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">


                        <div class="col-md-8">
                            <h4 id="line6_11"> _Init </h4>
                            <p>
                                This procedure is executed before event starting and event ending
                            </p>

                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">


                        <div class="col-md-8">
                            <h4 id="line6_12"> _Lottery </h4>
                            <p>
                                This procedure is responsible for lottery events
                            </p>

                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->


                    <div class="row">


                        <div class="col-md-8">
                            <h4 id="line6_13"> _IncreaseKillCount </h4>
                            <p>
                                This procedure is responsible for increasing kill counters , using MaxiGuardfilter
                            </p>

                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">


                        <div class="col-md-8">
                            <h4 id="line6_14"> _NoticeControl </h4>
                            <p>
                                This procedure is responsible for in-game notices events, you can control the messages (Ignore to send the notice by bot and send it by filter, change color of the notice if your filter support this , send notices at x region only, etc..)
                            </p>

                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">


                        <div class="col-md-8">
                            <h4 id="line6_15"> _OnEventStart </h4>
                            <p>
                                This procedure is excuted while bot says [ Event has been started] , aslo you can use this procedure to add a KillCounter at survival arena using MaxiGuard Filter
                            </p>

                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">


                        <div class="col-md-8">
                            <h4 id="line6_16"> _OnEventENd </h4>
                            <p>
                                This procedure is excuted while bot says [ Event has been ended]
                            </p>

                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->


                </section>
                <!-- end section -->




                <section id="line8" class="section">

                    <div class="row">
                        <div class="col-md-12 left-align">
                            <h2 class="dark-text">Support Desk <hr></h2>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-md-6">
                            <p>Please remember you have purchased a very affordable bot and you have not to pay for any upcoming-updates.
                                Occasionally we will help you to build a custom feature, but these requests will be put on a lower priority due to their nature.
                                Support is also 100% optional and we provide it for your connivence, so please be patient, polite and respectful.</p>

                            <p>Please visit my <a href="https://www.facebook.com/Abdelaziz.Omar93/"><strong>profile page</strong></a> or ask question <a href="mailto:abdelazizomar851@gmail.com">@abdelazizomar</a></p>


                        </div>

                        <div class="col-md-6">
                            <strong>Before seeking support, please...</strong>
                            <ul>
                                <li>* Make sure your question is a valid bot Issue and not a customization request.</li>
                                <li>* Make sure you have read through the documentation and any related video guides before asking support on how to accomplish a task.</li>
                                <li>* Make sure to double check the bot FAQs.</li>
                                <li>* Try disabling any active plugins to make sure there isn't a conflict with a plugin. And if there is this way you can let us know.</li>
                                <li>* If you have customized your bot and now have an issue, back-track to make sure you didn't make a mistake. If you have made changes and can't find the issue, please provide us with your changelog.</li>
                                <li>* Almost 80% of the time we find that the solution to people's issues can be solved with a simple "Brain.exe". You might want to try that before seeking support. You might be able to fix the issue yourself much quicker than we can respond to your request.</li>
                            </ul>
                        </div>
                    </div>
                    <!-- end row -->

                </section>
                <!-- end section -->


                <section id="line9" class="section">

                    <div class="row">
                        <div class="col-md-12 left-align">
                            <h2 class="dark-text">Version History (Changelog) <hr></h2>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-md-12">

                            <p>Once again, thank you so much for purchasing this bot. As I said at the beginning,
                                I'd be glad to help you if you have any questions relating to this bot. No guarantees,
                                but I'll do my best to assist. If you have a more general question relating to the bot, you might consider visiting the discord and asking your question in the "Item Discussion" channel.</p>
                            <hr>

                            <h4>Changelog</h4>

                            <pre class="brush: html">

                                        -----------------------------------------------------------------------------------------
                                        Version 1.0.7 - April 22th, 2021
                                        -----------------------------------------------------------------------------------------

                                        - uBot has been published






                                      </pre>

                        </div>
                    </div>
                    <!-- end row -->

                </section>
                <!-- end section -->

                <section id="line10" class="section">

                    <div class="row">
                        <div class="col-md-12 left-align">
                            <h2 class="dark-text">Copyright and license <hr></h2>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-md-12">

                            <p>Code released under the <a href="#" target="_blank">Un License</a> License.</p>

                            <!--                                 <p>For more information about copyright and license check <a href="https://choosealicense.com/" target="_blank">choosealicense.com</a>.</p>
-->
                        </div>
                    </div>
                    <!-- end row -->

                </section>
                <!-- end section -->
            </div>
            <!-- // end .col -->

        </div>
        <!-- // end .row -->

    </div>
    <!-- // end container -->

</div>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/retina.js') }}"></script>
<script src="{{ asset('js/jquery.fitvids.js') }}"></script>
<script src="{{ asset('js/wow.js') }}"></script>
<script src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>

<!-- CUSTOM PLUGINS -->
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

<script src="{{ asset('js/syntax-highlighter/scripts/shCore.js') }}"></script>
<script src="{{ asset('js/syntax-highlighter/scripts/shBrushXml.js') }}"></script>
<script src="{{ asset('js/syntax-highlighter/scripts/shBrushCss.js') }}"></script>
<script src="{{ asset('js/syntax-highlighter/scripts/shBrushJScript.js') }}"></script>

</body>

</html>
