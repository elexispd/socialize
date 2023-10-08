@extends("layouts.layout")

@section("content")

<div class="main_content">
    <div class="mcontainer">

        <!--  Feeds  -->
        <div class="lg:flex lg:space-x-10">
            <div class="lg:w-3/4 lg:px-20 space-y-7">

                {{-- <!-- user story -->
                @include("partials._user-story")

                <!-- create post -->
                @include('partials._modal-post')
                @include('partials._birthdays')
                @include('partials._story-preview')


                @include('partials._post') --}}

                <!-- user story -->
                <div class="user_story grid md:grid-cols-5 grid-cols-3 gap-2 lg:-mx-20 relative">

                    <a href="#create-post" uk-toggle="target: body ; cls: story-active">
                        <div class="single_story">
                            <img src="assets/images/avatars/avatar-lg-1.jpg" alt="">
                            <div class="story-avatar"> <img src="assets/images/avatars/avatar-6.jpg" alt=""></div>
                            <div class="story-content"> <h4>Erica Jones </h4> </div>
                        </div>
                    </a>
                    <a href="#" uk-toggle="target: body ; cls: story-active">
                        <div class="single_story">
                            <img src="assets/images/avatars/avatar-lg-2.jpg" alt="">
                            <div class="story-avatar"> <img src="assets/images/avatars/avatar-2.jpg" alt=""></div>
                            <div class="story-content"> <h4>  Dennis Han</h4> </div>
                        </div>
                    </a>
                    <a href="#" uk-toggle="target: body ; cls: story-active">
                        <div class="single_story">
                            <img src="assets/images/avatars/avatar-lg-3.jpg" alt="">
                            <div class="story-avatar"> <img src="assets/images/avatars/avatar-3.jpg" alt=""></div>
                            <div class="story-content"> <h4> Alex Mohani</h4> </div>
                        </div>
                    </a>
                    <a href="#" uk-toggle="target: body ; cls: story-active">
                        <div class="single_story">
                            <img src="assets/images/avatars/avatar-lg-4.jpg" alt="">
                            <div class="story-avatar"> <img src="assets/images/avatars/avatar-4.jpg" alt=""></div>
                            <div class="story-content"> <h4> Jonathan </h4> </div>
                        </div>
                    </a>
                    <a href="#" uk-toggle="target: body ; cls: story-active">
                        <div class="single_story">
                            <img src="assets/images/avatars/avatar-lg-5.jpg" alt="">
                            <div class="story-avatar"> <img src="assets/images/avatars/avatar-5.jpg" alt=""></div>
                            <div class="story-content"> <h4> Stella Johnson</h4> </div>
                        </div>
                    </a>

                    <span class="absolute bg-white lg:flex items-center justify-center p-2 rounded-full
                    shadow-md text-xl w-9 z-10 uk-position-center-right -mr-4 hidden" uk-toggle="target: body ; cls: story-active">
                    <i class="icon-feather-chevron-right"></i></span>

                </div>

                @include('partials._birthdays')

                <div class="flex justify-center">
                    @include('partials._message')
                </div>

                <!-- create post -->
                @include('partials._modal-post')

                @include('partials._post')






                <div class="flex justify-center mt-6">
                    <a href="#" class="bg-white dark:bg-gray-900 font-semibold my-3 px-6 py-2 rounded-full shadow-md dark:bg-gray-800 dark:text-white">
                        Load more ..</a>
                </div>

            </div>
            <div class="lg:w-72 w-full">

                <a href="#birthdays" uk-toggle>
                    <div class="bg-white mb-5 px-4 py-3 rounded-md shadow">
                        <h3 class="text-line-through font-semibold mb-1"> Birthdays </h3>
                        <div class="-mx-2 duration-300 flex hover:bg-gray-50 px-2 py-2 rounded-md">
                            <img src="images/icons/gift-icon.png" class="w-9 h-9 mr-3" alt="">
                            <p class="line-clamp-2 leading-6"> <strong> Jessica Erica </strong> and <strong> two others </strong>
                                have a birthdays to day .
                            </p>
                        </div>
                    </div>
                </a>

                <h3 class="text-xl font-semibold"> Contacts </h3>

                <div class="" uk-sticky="offset:80">

                    <nav class="responsive-nav border-b extanded mb-2 -mt-2">
                        <ul uk-switcher="connect: #group-details; animation: uk-animation-fade">
                            {{-- <li class="uk-active"><a class="active" href="#0">  Friends  <span> {{ $friends->count() }}</span> </a></li> --}}
                        </ul>
                    </nav>

                    <div class="contact-list">
                        @isset($friends)
                            @foreach ($friends as $friend)
                            <a href="#">
                                <div class="contact-avatar">
                                    <img src="{{ asset('useravatar/default.jpg') }}" alt="">
                                    <span class="user_status {{ $friend->is_online ? 'status_online' : 'status_offline' }}"></span>
                                </div>
                                <div class="contact-username"> {{ $friend->firstname }} {{ $friend->lastname }}</div>
                            </a>
                            <div uk-drop="pos: left-center ;animation: uk-animation-slide-left-small">
                                <div class="contact-list-box">
                                    <div class="contact-avatar">
                                        <img src="images/avatars/avatar-2.jpg" alt="">
                                        <span class="user_status status_online"></span>
                                    </div>
                                    <div class="contact-username">  {{ $friend->firstname }} {{ $friend->lastname }} </div>
                                    <p>
                                        <ion-icon name="people" class="text-lg mr-1"></ion-icon> Become friends with
                                        <strong> Stella Johnson </strong> and <strong> 14 Others</strong>
                                    </p>
                                    <div class="contact-list-box-btns">
                                        <button type="button" class="button primary flex-1 block mr-2">
                                            <i class="uil-envelope mr-1"></i> Send message</button>
                                        <button type="button"  href="#" class="button secondary button-icon mr-2">
                                            <i class="uil-list-ul"> </i> </button>
                                        <button type="button" a href="#" class="button secondary button-icon">
                                            <i class="uil-ellipsis-h"> </i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @endisset





                    </div>


                </div>

            </div>
        </div>

    </div>
</div>


<div class="story-prev">

    <div class="story-sidebar uk-animation-slide-left-medium">
        <div class="md:flex justify-between items-center py-2 hidden">
            <h3 class="text-2xl font-semibold"> All Story </h3>
            <a href="#" class="text-blue-600"> Setting</a>
        </div>

        <div class="story-sidebar-scrollbar" data-simplebar>
            <h3 class="text-lg font-medium"> Your Story </h3>

            <a class="flex space-x-4 items-center hover:bg-gray-100 md:my-2 py-2 rounded-lg hover:text-gray-700" href="#">
                <svg class="w-12 h-12 p-3 bg-gray-200 rounded-full text-blue-500 ml-1" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                <div class="flex-1">
                    <div class="text-lg font-semibold"> Create a story </div>
                    <div class="text-sm -mt-0.5"> Share a photo or write something. </div>
                </div>
            </a>

            <h3 class="text-lg font-medium lg:mt-3 mt-1"> Friends Story </h3>

            <div class="story-users-list"  uk-switcher="connect: #story_slider ; toggle: > * ; animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium ">

                <a href="#">
                    <div class="story-media">
                        <img src="images/avatars/avatar-1.jpg" alt="">
                    </div>
                    <div class="story-text">
                        <div class="story-username"> Dennis Han</div>
                        <p> <span class="story-count"> 2 new </span> <span class="story-time"> 4Mn ago</span> </p>
                    </div>
                </a>
                <a href="#">
                    <div class="story-media">
                        <img src="images/avatars/avatar-2.jpg" alt="">
                    </div>
                    <div class="story-text">
                        <div class="story-username"> Adrian Mohani</div>
                        <p> <span class="story-count"> 1 new </span> <span class="story-time"> 1hr ago</span> </p>
                    </div>
                </a>
                <a href="#">
                    <div class="story-media">
                        <img src="images/avatars/avatar-3.jpg" alt="">
                    </div>
                    <div class="story-text">
                        <div class="story-username">Alex Dolgove </div>
                        <p> <span class="story-count"> 3 new </span> <span class="story-time"> 2hr ago</span> </p>
                    </div>
                </a>
                <a href="#">
                    <div class="story-media">
                        <img src="images/avatars/avatar-4.jpg" alt="">
                    </div>
                    <div class="story-text">
                        <div class="story-username"> Stella Johnson </div>
                        <p> <span class="story-count"> 2 new </span> <span class="story-time"> 3hr ago</span> </p>
                    </div>
                </a>
                <a href="#">
                    <div class="story-media">
                        <img src="images/avatars/avatar-5.jpg" alt="">
                    </div>
                    <div class="story-text">
                        <div class="story-username"> Adrian Mohani </div>
                        <p> <span class="story-count"> 1 new </span> <span class="story-time"> 4hr ago</span> </p>
                    </div>
                </a>
                <a href="#">
                    <div class="story-media">
                        <img src="images/avatars/avatar-8.jpg" alt="">
                    </div>
                    <div class="story-text">
                        <div class="story-username"> Dennis Han</div>
                        <p> <span class="story-count"> 2 new </span> <span class="story-time"> 8Hr ago</span> </p>
                    </div>
                </a>
                <a href="#">
                    <div class="story-media">
                        <img src="images/avatars/avatar-6.jpg" alt="">
                    </div>
                    <div class="story-text">
                        <div class="story-username"> Adrian Mohani</div>
                        <p> <span class="story-count"> 1 new </span> <span class="story-time"> 12hr ago</span> </p>
                    </div>
                </a>
                <a href="#">
                    <div class="story-media">
                        <img src="images/avatars/avatar-7.jpg" alt="">
                    </div>
                    <div class="story-text">
                        <div class="story-username">Alex Dolgove </div>
                        <p> <span class="story-count"> 3 new </span> <span class="story-time"> 22hr ago</span> </p>
                    </div>
                </a>
                <a href="#">
                    <div class="story-media">
                        <img src="images/avatars/avatar-8.jpg" alt="">
                    </div>
                    <div class="story-text">
                        <div class="story-username"> Stella Johnson </div>
                        <p> <span class="story-count"> 2 new </span> <span class="story-time"> 3Dy ago</span> </p>
                    </div>
                </a>
                <a href="#">
                    <div class="story-media">
                        <img src="images/avatars/avatar-5.jpg" alt="">
                    </div>
                    <div class="story-text">
                        <div class="story-username"> Adrian Mohani </div>
                        <p> <span class="story-count"> 1 new </span> <span class="story-time"> 4Dy ago</span> </p>
                    </div>
                </a>


            </div>


        </div>

    </div>
    <div class="story-content">

        <ul class="uk-switcher uk-animation-scale-up" id="story_slider" >
            <li class="relative">

                <span uk-switcher-item="previous" class="slider-icon is-left"> </span>
                <span uk-switcher-item="next" class="slider-icon is-right"> </span>

                <div uk-lightbox>
                    <a href="images/avatars/avatar-lg-2.jpg" data-alt="Image">
                        <img src="images/avatars/avatar-lg-2.jpg" class="story-slider-image"  data-alt="Image">
                    </a>
                </div>

            </li>
            <li class="relative">

                <span uk-switcher-item="previous" class="slider-icon is-left"> </span>
                <span uk-switcher-item="next" class="slider-icon is-right"> </span>

                <div uk-lightbox>
                    <a href="images/avatars/avatar-lg-1.jpg" data-alt="Image">
                        <img src="images/avatars/avatar-lg-1.jpg" class="story-slider-image"  data-alt="Image">
                    </a>
                </div>

            </li>
            <li class="relative">

                <span uk-switcher-item="previous" class="slider-icon is-left"> </span>
                <span uk-switcher-item="next" class="slider-icon is-right"> </span>

                <div uk-lightbox>
                    <a href="images/avatars/avatar-lg-4.jpg" data-alt="Image">
                        <img src="images/avatars/avatar-lg-4.jpg" class="story-slider-image"  data-alt="Image">
                    </a>
                </div>

            </li>

            <li class="relative">
                <div class="bg-gray-200 story-slider-placeholder shadow-none animate-pulse"> </div>
            </li>
            <li class="relative">
                <div class="bg-gray-200 story-slider-placeholder shadow-none animate-pulse"> </div>
            </li>
            <li class="relative">
                <div class="bg-gray-200 story-slider-placeholder shadow-none animate-pulse"> </div>
            </li>
            <li class="relative">
                <div class="bg-gray-200 story-slider-placeholder shadow-none animate-pulse"> </div>
            </li>
            <li class="relative">
                <div class="bg-gray-200 story-slider-placeholder shadow-none animate-pulse"> </div>
            </li>
            <li class="relative">
                <div class="bg-gray-200 story-slider-placeholder shadow-none animate-pulse"> </div>
            </li>
            <li class="relative">
                <div class="bg-gray-200 story-slider-placeholder shadow-none animate-pulse"> </div>
            </li>
            <li class="relative">
                <div class="bg-gray-200 story-slider-placeholder shadow-none animate-pulse"> </div>
            </li>
        </ul>

    </div>

    <!-- story colose button-->
    <span class="story-btn-close" uk-toggle="target: body ; cls: story-active"
        uk-tooltip="title:Close story ; pos: left">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </span>



</div>


@endsection
