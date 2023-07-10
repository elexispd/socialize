@extends("layouts.layout")

@section("content")

<div class="main_content">
    <div class="mcontainer">
        
        <!--  Feeds  -->
        <div class="lg:flex lg:space-x-10">
            <div class="lg:w-3/4 lg:px-20 space-y-7"> 
        
                <!-- user story -->
                @include("partials._user-story")
                
                <!-- create post -->
                @include('partials._modal-post')
                @include('partials._birthdays')
                @include('partials._story-preview')


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
                            <li class="uk-active"><a class="active" href="#0">  Friends  <span> 310 </span> </a></li>
                        </ul>
                    </nav>
        
                    <div class="contact-list">
        
                        <a href="#">
                            <div class="contact-avatar">
                                <img src="images/avatars/avatar-1.jpg" alt="">
                                <span class="user_status status_online"></span>
                            </div>
                            <div class="contact-username"> Dennis Han</div>
                        </a>
                        <div uk-drop="pos: left-center ;animation: uk-animation-slide-left-small">
                            <div class="contact-list-box">
                                <div class="contact-avatar">
                                    <img src="images/avatars/avatar-2.jpg" alt="">
                                    <span class="user_status status_online"></span>
                                </div>
                                <div class="contact-username">   Dennis Han</div>
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
        
                        <a href="#">
                            <div class="contact-avatar">
                                <img src="images/avatars/avatar-2.jpg" alt="">
                                <span class="user_status"></span>
                            </div>
                            <div class="contact-username"> Erica Jones</div>
                        </a>
                        <div uk-drop="pos: left-center ;animation: uk-animation-slide-left-small">
                            <div class="contact-list-box">
                                <div class="contact-avatar">
                                    <img src="images/avatars/avatar-1.jpg" alt="">
                                    <span class="user_status"></span>
                                </div>
                                <div class="contact-username">  Erica Jones </div>
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
                        <a href="timeline.html">
                            <div class="contact-avatar">
                                <img src="images/avatars/avatar-5.jpg" alt="">
                                <span class="user_status status_online"></span>
                            </div>
                            <div class="contact-username">Stella Johnson</div>
                        </a>
                        <a href="timeline.html">
                            <div class="contact-avatar">
                                <img src="images/avatars/avatar-6.jpg" alt="">
                            </div>
                            <div class="contact-username"> Alex Dolgove</div>
                        </a>
                        
                        <a href="timeline.html">
                            <div class="contact-avatar">
                                <img src="images/avatars/avatar-1.jpg" alt="">
                                <span class="user_status status_online"></span>
                            </div>
                            <div class="contact-username"> Dennis Han</div>
                        </a>
                        <a href="timeline.html">
                            <div class="contact-avatar">
                                <img src="images/avatars/avatar-2.jpg" alt="">
                                <span class="user_status"></span>
                            </div>
                            <div class="contact-username"> Erica Jones</div>
                        </a>
                        <a href="timeline.html">
                            <div class="contact-avatar">
                                <img src="images/avatars/avatar-7.jpg" alt="">
                            </div>
                            <div class="contact-username">Stella Johnson</div>
                        </a>
                        <a href="timeline.html">
                            <div class="contact-avatar">
                                <img src="images/avatars/avatar-4.jpg" alt="">
                            </div>
                            <div class="contact-username"> Alex Dolgove</div>
                        </a>
        
        
                    </div>
        
        
                </div>
        
            </div>
        </div>

    </div>
</div>




@endsection