@extends("layouts.layout")

@section("content")

<div class="main_content">
    <div class="mcontainer">
        <!-- Profile cover -->
        <div class="profile user-profile">

            <div class="profiles_banner">
                <img src="{{ asset('assets/images/avatars/profile-cover.jpg') }}" alt="">

                @if (auth()->check() && $user->id == auth()->user()->id)
                    <div class="profile_action absolute bottom-0 right-0 space-x-1.5 p-3 text-sm z-50 hidden lg:flex">
                    <a href="#" class="flex items-center justify-center h-8 px-3 rounded-md bg-gray-700 bg-opacity-70 text-white space-x-1.5">
                        <ion-icon name="crop-outline" class="text-xl"></ion-icon>
                        <span> Crop  </span>
                    </a>
                    <a href="#" class="flex items-center justify-center h-8 px-3 rounded-md bg-gray-700 bg-opacity-70 text-white space-x-1.5">
                        <ion-icon name="create-outline" class="text-xl"></ion-icon>
                        <span> Edit </span>
                    </a>

                  </div>
                @endif


            </div>
            <div class="profiles_content">

                <div class="profile_avatar">
                    <div class="profile_avatar_holder">
                        <img src="{{asset('assets/images/avatars/avatar-8.jpg')}}" alt="">
                    </div>
                    <div class="user_status status_online"></div>
                    <div class="icon_change_photo" hidden> <ion-icon name="camera" class="text-xl"></ion-icon> </div>
                </div>

                <div class="profile_info text-center">
                    <h1> {{ $user->getFullname() }} </h1>
                    <p> {{ $user->about }} </p>
                </div>

            </div>
            <div class="flex justify-center">
                @include('partials._message')
            </div>

            <div class="flex justify-between lg:border-t border-gray-100 flex-col-reverse lg:flex-row pt-2">
                <nav class="responsive-nav pl-3">
                    <ul  uk-switcher="connect: #timeline-tab; animation: uk-animation-fade">
                        <li><a href="#">Timeline</a></li>
                        <li><a href="#">Friends <span> {{ count($friends) }}  </span> </a></li>
                        <li><a href="#">Photos </a></li>
                        <li><a href="#">Profile</a></li>
                    </ul>
                </nav>
                @if (auth()->user()->isFriendWith($user))
                    <form action="{{ route('unfriend', $user->id) }}" method="post" style="margin-right: 50px;">
                        @csrf
                        @method("delete")
                        <button type="submit" class=" h-10 px-5 rounded-md bg-blue-600 text-white space-x-1.5 hover:text-white">
                            Unfriend
                        </button>
                    </form>
                @else
                    @if ( $mySentRequests->contains('friend_id', $user->id) )

                        <form action="{{ route('unfriend',  ['id' => $user->id] ) }}" method="post">
                            @csrf
                            @method("delete")
                            <input type="hidden" name="message" value="Friend request cancelled" hidden>
                            <button type="submit" class="bg-blue-400 text-white font-bold py-2 px-4 rounded-sm text-xs" >Cancel Request</button>
                        </form>
                    @else
                        <form action="{{ route('addFriend') }}" method="post">
                            @csrf
                            <input type="number" name="friend_id" id="" value="{{ $user->id }}" hidden>
                            <button type="submit" class=" h-10 px-5 rounded-md bg-blue-600 text-white space-x-1.5 hover:text-white"  style="width: 130px;">
                                Add Friend
                            </button>
                        </form>
                    @endif

                @endif

                @if (auth()->check() && $user->id == auth()->user()->id)
                    <!-- button actions -->
                    <div class="flex items-center space-x-1.5 flex-shrink-0 pr-4 mb-2 justify-center order-1 relative">

                        <!-- add story -->
                        <a href="#" class="flex items-center justify-center h-10 px-5 rounded-md bg-blue-600 text-white space-x-1.5 hover:text-white"  uk-toggle="target: #create-post-modal">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path>
                            </svg>
                            <span> Add Your Story </span>
                        </a>



                        <!-- more icon -->
                        <a href="#" class="flex items-center justify-center h-10 w-10 rounded-md bg-gray-100">
                            <ion-icon name="ellipsis-horizontal" class="text-xl"></ion-icon>
                        </a>
                        <!-- more drowpdown -->
                        <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden border border-gray-100 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700"
                        uk-drop="mode: click;pos: bottom-right;animation: uk-animation-slide-bottom-small; offset:5">
                            <ul class="space-y-1">
                                <li>
                                    <a href="#" class="flex items-center px-3 py-2 hover:bg-gray-100 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                    <ion-icon name="arrow-redo-outline" class="pr-2 text-xl"></ion-icon> Share Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center px-3 py-2 hover:bg-gray-100 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                    <ion-icon name="create-outline" class="pr-2 text-xl"></ion-icon>  Account setting
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center px-3 py-2 hover:bg-gray-100 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                    <ion-icon name="notifications-off-outline" class="pr-2 text-lg"></ion-icon>   Disable notifications
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center px-3 py-2 hover:bg-gray-100 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                    <ion-icon name="star-outline"  class="pr-2 text-xl"></ion-icon>  Add favorites
                                    </a>
                                </li>
                                <li>
                                <hr class="-mx-2 my-2 dark:border-gray-800">
                                </li>
                                <li>
                                    <a href="#" class="flex items-center px-3 py-2 text-red-500 hover:bg-red-50 hover:text-red-500 rounded-md dark:hover:bg-red-600">
                                    <ion-icon name="stop-circle-outline" class="pr-2 text-xl"></ion-icon>  Unfriend
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif
            </div>

        </div>

        <div class="uk-switcher lg:mt-8 mt-4" id="timeline-tab">

            <!-- Timeline -->
            <div class="md:flex md:space-x-6 lg:mx-16">
                <div class="space-y-5 flex-shrink-0 md:w-7/12">

                @if (auth()->check() && $user->id == auth()->user()->id)
                    <!-- create post  -->
                   @include('partials._modal-post')
                @endif



                   <div class="card lg:mx-0 uk-animation-slide-bottom-small">

                       <!-- post header-->
                       <div class="flex justify-between items-center lg:p-4 p-2.5">
                           <div class="flex flex-1 items-center space-x-4">
                               <a href="#">
                                   <img src="{{ asset('assets/images/avatars/avatar-2.jpg') }}" class="bg-gray-200 border border-white rounded-full w-10 h-10">
                               </a>
                               <div class="flex-1 font-semibold capitalize">
                                   <a href="#" class="text-black dark:text-gray-100"> Johnson smith </a>
                                   <div class="text-gray-700 flex items-center space-x-2"> 5 <span> hrs </span> <ion-icon name="people"></ion-icon></div>
                               </div>
                           </div>
                         <div>
                           <a href="#"> <i class="icon-feather-more-horizontal text-2xl hover:bg-gray-200 rounded-full p-2 transition -mr-1 dark:hover:bg-gray-700"></i> </a>
                           <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base border border-gray-100 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700"
                           uk-drop="mode: click;pos: bottom-right;animation: uk-animation-slide-bottom-small">

                               <ul class="space-y-1">
                                 <li>
                                     <a href="#" class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                      <i class="uil-share-alt mr-1"></i> Share
                                     </a>
                                 </li>
                                 <li>
                                     <a href="#" class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                      <i class="uil-edit-alt mr-1"></i>  Edit Post
                                     </a>
                                 </li>
                                 <li>
                                     <a href="#" class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                      <i class="uil-comment-slash mr-1"></i>   Disable comments
                                     </a>
                                 </li>
                                 <li>
                                     <a href="#" class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                      <i class="uil-favorite mr-1"></i>  Add favorites
                                     </a>
                                 </li>
                                 <li>
                                   <hr class="-mx-2 my-2 dark:border-gray-800">
                                 </li>
                                 <li>
                                     <a href="#" class="flex items-center px-3 py-2 text-red-500 hover:bg-red-100 hover:text-red-500 rounded-md dark:hover:bg-red-600">
                                      <i class="uil-trash-alt mr-1"></i>  Delete
                                     </a>
                                 </li>
                               </ul>

                           </div>
                         </div>
                       </div>

                       <div uk-lightbox>
                           <a href="{{ asset('assets/images/avatars/avatar-lg-3.jpg') }}">
                               <img src="{{ asset('assets/images/avatars/avatar-lg-4.jpg') }}" alt="" class="max-h-96 w-full object-cover">
                           </a>
                       </div>

                       <div class="p-4 space-y-3">

                        <div class="flex space-x-4 lg:font-bold">
                            <a href="#" class="flex items-center space-x-2">
                                <div class="p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="dark:text-gray-100">
                                        <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                    </svg>
                                </div>
                                <div> Like</div>
                            </a>
                            <a href="#" class="flex items-center space-x-2">
                                <div class="p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="dark:text-gray-100">
                                        <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div> Comment</div>
                            </a>
                            <a href="#" class="flex items-center space-x-2 flex-1 justify-end">
                                <div class="p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="dark:text-gray-100">
                                        <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                    </svg>
                                </div>
                                <div> Share</div>
                            </a>
                        </div>
                        <div class="flex items-center space-x-3 pt-2">
                            <div class="flex items-center">
                                <img src="images/avatars/avatar-1.jpg')}}" alt="" class="w-6 h-6 rounded-full border-2 border-white dark:border-gray-900">
                                <img src="images/avatars/avatar-4.jpg')}}" alt="" class="w-6 h-6 rounded-full border-2 border-white dark:border-gray-900 -ml-2">
                                <img src="images/avatars/avatar-2.jpg')}}" alt="" class="w-6 h-6 rounded-full border-2 border-white dark:border-gray-900 -ml-2">
                            </div>
                            <div class="dark:text-gray-100">
                                Liked <strong> Johnson</strong> and <strong> 209 Others </strong>
                            </div>
                        </div>

                        <div class="border-t py-4 space-y-4 dark:border-gray-600">
                            <div class="flex">
                                <div class="w-10 h-10 rounded-full relative flex-shrink-0">
                                    <img src="images/avatars/avatar-1.jpg')}}" alt="" class="absolute h-full rounded-full w-full">
                                </div>
                                <div>
                                    <div class="text-gray-700 py-2 px-3 rounded-md bg-gray-100 relative lg:ml-5 ml-2 lg:mr-12  dark:bg-gray-800 dark:text-gray-100">
                                        <p class="leading-6">In ut odio libero vulputate <urna class="i uil-heart"></urna> <i
                                                class="uil-grin-tongue-wink"> </i> </p>
                                        <div class="absolute w-3 h-3 top-3 -left-1 bg-gray-100 transform rotate-45 dark:bg-gray-800"></div>
                                    </div>
                                    <div class="text-sm flex items-center space-x-3 mt-2 ml-5">
                                        <a href="#" class="text-red-600"> <i class="uil-heart"></i> Love </a>
                                        <a href="#"> Replay </a>
                                        <span> 3d </span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="w-10 h-10 rounded-full relative flex-shrink-0">
                                    <img src="images/avatars/avatar-1.jpg')}}" alt="" class="absolute h-full rounded-full w-full">
                                </div>
                                <div>
                                    <div class="text-gray-700 py-2 px-3 rounded-md bg-gray-100 relative lg:ml-5 ml-2 lg:mr-12  dark:bg-gray-800 dark:text-gray-100">
                                        <p class="leading-6"> sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. David !<i class="uil-grin-tongue-wink-alt"></i> </p>
                                        <div class="absolute w-3 h-3 top-3 -left-1 bg-gray-100 transform rotate-45 dark:bg-gray-800"></div>
                                    </div>
                                    <div class="text-xs flex items-center space-x-3 mt-2 ml-5">
                                        <a href="#" class="text-red-600"> <i class="uil-heart"></i> Love </a>
                                        <a href="#"> Replay </a>
                                        <span> 3d </span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <a href="#" class="hover:text-blue-600 hover:underline">  Veiw 8 more Comments </a>

                        <div class="bg-gray-100 rounded-full relative dark:bg-gray-800 border-t">
                            <input placeholder="Add your Comment.." class="bg-transparent max-h-10 shadow-none px-5">
                            <div class="-m-0.5 absolute bottom-0 flex items-center right-3 text-xl">
                                <a href="#">
                                    <ion-icon name="happy-outline" class="hover:bg-gray-200 p-1.5 rounded-full"></ion-icon>
                                </a>
                                <a href="#">
                                    <ion-icon name="image-outline" class="hover:bg-gray-200 p-1.5 rounded-full"></ion-icon>
                                </a>
                                <a href="#">
                                    <ion-icon name="link-outline" class="hover:bg-gray-200 p-1.5 rounded-full"></ion-icon>
                                </a>
                            </div>
                        </div>

                    </div>


                       <div class="p-4 space-y-3">

                           <div class="flex space-x-4 lg:font-bold">
                               <a href="#" class="flex items-center space-x-2">
                                   <div class="p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600">
                                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="dark:text-gray-100">
                                           <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                       </svg>
                                   </div>
                                   <div> Like</div>
                               </a>
                               <a href="#" class="flex items-center space-x-2">
                                   <div class="p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600">
                                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="dark:text-gray-100">
                                           <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                                       </svg>
                                   </div>
                                   <div> Comment</div>
                               </a>
                               <a href="#" class="flex items-center space-x-2 flex-1 justify-end">
                                   <div class="p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600">
                                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="dark:text-gray-100">
                                           <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                       </svg>
                                   </div>
                                   <div> Share</div>
                               </a>
                           </div>
                           <div class="flex items-center space-x-3 pt-2">
                               <div class="flex items-center">
                                   <img src="{{ asset('assets/images/avatars/avatar-1.jpg') }}" alt="" class="w-6 h-6 rounded-full border-2 border-white dark:border-gray-900">
                                   <img src="{{ asset('assets/images/avatars/avatar-4.jpg') }}" alt="" class="w-6 h-6 rounded-full border-2 border-white dark:border-gray-900 -ml-2">
                                   <img src="{{ asset('assets/images/avatars/avatar-2.jpg') }}" alt="" class="w-6 h-6 rounded-full border-2 border-white dark:border-gray-900 -ml-2">
                               </div>
                               <div class="dark:text-gray-100">
                                   Liked <strong> Johnson</strong> and <strong> 209 Others </strong>
                               </div>
                           </div>

                           <div class="border-t py-4 space-y-4 dark:border-gray-600">
                               <div class="flex">
                                   <div class="w-10 h-10 rounded-full relative flex-shrink-0">
                                       <img src="{{ asset('assets/images/avatars/avatar-1.jpg') }}" alt="" class="absolute h-full rounded-full w-full">
                                   </div>
                                   <div>
                                       <div class="text-gray-700 py-2 px-3 rounded-md bg-gray-100 relative lg:ml-5 ml-2 lg:mr-12  dark:bg-gray-800 dark:text-gray-100">
                                           <p class="leading-6">In ut odio libero vulputate <urna class="i uil-heart"></urna> <i
                                                   class="uil-grin-tongue-wink"> </i> </p>
                                           <div class="absolute w-3 h-3 top-3 -left-1 bg-gray-100 transform rotate-45 dark:bg-gray-800"></div>
                                       </div>
                                       <div class="text-sm flex items-center space-x-3 mt-2 ml-5">
                                           <a href="#" class="text-red-600"> <i class="uil-heart"></i> Love </a>
                                           <a href="#"> Replay </a>
                                           <span> 3d </span>
                                       </div>
                                   </div>
                               </div>
                               <div class="flex">
                                   <div class="w-10 h-10 rounded-full relative flex-shrink-0">
                                       <img src="{{ asset('assets/images/avatars/avatar-1.jpg') }}" alt="" class="absolute h-full rounded-full w-full">
                                   </div>
                                   <div>
                                       <div class="text-gray-700 py-2 px-3 rounded-md bg-gray-100 relative lg:ml-5 ml-2 lg:mr-12  dark:bg-gray-800 dark:text-gray-100">
                                           <p class="leading-6"> sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. David !<i class="uil-grin-tongue-wink-alt"></i> </p>
                                           <div class="absolute w-3 h-3 top-3 -left-1 bg-gray-100 transform rotate-45 dark:bg-gray-800"></div>
                                       </div>
                                       <div class="text-xs flex items-center space-x-3 mt-2 ml-5">
                                           <a href="#" class="text-red-600"> <i class="uil-heart"></i> Love </a>
                                           <a href="#"> Replay </a>
                                           <span> 3d </span>
                                       </div>
                                   </div>
                               </div>

                           </div>

                           <a href="#" class="hover:text-blue-600 hover:underline">  Veiw 8 more Comments </a>

                           <div class="bg-gray-100 rounded-full relative dark:bg-gray-800 border-t">
                               <input placeholder="Add your Comment.." class="bg-transparent max-h-10 shadow-none px-5">
                               <div class="-m-0.5 absolute bottom-0 flex items-center right-3 text-xl">
                                   <a href="#">
                                       <ion-icon name="happy-outline" class="hover:bg-gray-200 p-1.5 rounded-full"></ion-icon>
                                   </a>
                                   <a href="#">
                                       <ion-icon name="image-outline" class="hover:bg-gray-200 p-1.5 rounded-full"></ion-icon>
                                   </a>
                                   <a href="#">
                                       <ion-icon name="link-outline" class="hover:bg-gray-200 p-1.5 rounded-full"></ion-icon>
                                   </a>
                               </div>
                           </div>

                       </div>

                   </div>



                   <div class="flex justify-center mt-6">
                       <a href="#" class="bg-white font-semibold my-3 px-6 py-2 rounded-full shadow-md dark:bg-gray-800 dark:text-white">
                           Load more ..</a>
                   </div>


                </div>

                <!-- Sidebar -->
                <div class="w-full space-y-6">

                    <div class="widget card p-5">
                        <h4 class="text-lg font-semibold"> About </h4>
                        <ul class="text-gray-600 space-y-3 mt-3">
                            <li class="flex items-center space-x-2">
                                <ion-icon name="home-sharp" class="rounded-full bg-gray-200 text-xl p-1 mr-3"></ion-icon>
                                Live In <strong> {{ $user->location }}  </strong>
                            </li>

                            <li class="flex items-center space-x-2">
                                <ion-icon name="heart-sharp" class="rounded-full bg-gray-200 text-xl p-1 mr-3"></ion-icon>
                                Relationship <strong> {{ $user->relationship }}  </strong>
                            </li>
                            <li class="flex items-center space-x-2">
                                <ion-icon name="logo-rss" class="rounded-full bg-gray-200 text-xl p-1 mr-3"></ion-icon>
                                Followed By <strong> {{ count($friends) }} {{ Str::plural("Person", count($friends)) }}</strong>
                            </li>
                        </ul>
                        <div class="gap-3 grid grid-cols-3 mt-4">
                          <img src="{{asset('assets/images/avatars/avatar-lg-2.jpg')}}" alt="" class="object-cover rounded-lg col-span-full">
                          <img src="{{asset('assets/images/avatars/avatar-2.jpg')}}" alt="" class="rounded-lg">
                          <img src="{{asset('assets/images/avatars/avatar-4.jpg')}}" alt="" class="rounded-lg">
                          <img src="{{asset('assets/images/avatars/avatar-5.jpg')}}" alt="" class="rounded-lg">
                      </div>
                      @if (auth()->check() && $user->id === auth()->user()->id)
                        <a href="{{ Route("edit_profile") }}" class="button gray mt-3 w-full"> Edit </a>
                      @endif

                    </div>

                </div>

            </div>

            <!-- Friends  -->
            <div class="card md:p-6 p-2 max-w-3xl mx-auto">

                <h2 class="text-xl font-bold">{{ Str::plural('Friend', count($friends)) }}</h2>

                <nav class="responsive-nav border-b">
                    <ul>
                        <li class="active"><a href="#" class="lg:px-2"> All Friends <span> {{ count($friends) }}</span> </a></li>
                        <li><a href="#" class="lg:px-2"> Recently added </a></li>
                        <li><a href="#" class="lg:px-2"> Family </a></li>
                        <li><a href="#" class="lg:px-2"> University </a></li>
                    </ul>
                </nav>

                <div class="grid md:grid-cols-4 sm:grid-cols-3 grid-cols-2 gap-x-2 gap-y-4 mt-3">

                    @foreach ($friends as $friend)
                      <div class="card p-2">
                        <a href="{{ Route('timeline', ['username' => urlencode($friend->username)] ) }}">
                            <img src="{{asset('assets/images/avatars/avatar-2.jpg')}}" class="h-36 object-cover rounded-md shadow-sm w-full">
                        </a>
                        <div class="pt-3 px-1">
                            <a href="{{ Route('timeline', ['username' => urlencode($friend->username)] ) }}" class="text-base font-semibold mb-0.5">  {{ $friend->getFullName()}} </a>
                            <p class="font-medium text-sm">{{ $friend->friendCount }} {{ Str::plural('Friend', $friend->friendCount) }}</p>


                            @if (!auth()->user()->isFriendWith($friend)  )
                                <button class="bg-blue-100 w-full flex font-semibold h-8 items-center justify-center mt-3 px-3 rounded-md text-blue-600 text-sm mb-1">
                                    Add Friend
                                </button>
                            @else
                                <button class="bg-blue-100 w-full flex font-semibold h-8 items-center justify-center mt-3 px-3 rounded-md text-blue-600 text-sm mb-1">
                                    Following
                                </button>
                            @endif

                        </div>
                      </div>

                    @endforeach

                </div>

                <div class="flex justify-center mt-6">
                    <a href="#" class="bg-white font-semibold my-3 px-6 py-2 rounded-full shadow-md dark:bg-gray-800 dark:text-white">
                        Load more ..</a>
                </div>

            </div>

            <!-- Photos  -->
            <div class="card md:p-6 p-2 max-w-3xl mx-auto">

                <div class="flex justify-between items-start relative md:mb-4 mb-3">
                    <div class="flex-1">
                        <h2 class="text-xl font-bold"> Photos </h2>
                        <nav class="responsive-nav style-2 md:m-0 -mx-4">
                            <ul>
                                <li class="active"><a href="#">  Photos of you  <span> 230</span> </a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="grid md:grid-cols-4 sm:grid-cols-3 grid-cols-2 gap-3 mt-5">
                    <div>
                        <div class="bg-green-400 max-w-full lg:h-44 h-36 rounded-lg relative overflow-hidden shadow uk-transition-toggle">
                            <img src="{{asset('assets/images/post/img-1.jpg')}}" class="w-full h-full absolute object-cover inset-0">
                            <!-- overly-->
                            <div class="-bottom-12 absolute bg-gradient-to-b from-transparent h-1/2 to-gray-800 uk-transition-slide-bottom-small w-full"></div>
                            <div class="absolute bottom-0 w-full p-3 text-white uk-transition-slide-bottom-small">
                                <div class="text-base"> Image description  </div>
                                <div class="flex justify-between text-xs">
                                   <a href="#">  Like</a>
                                   <a href="#">  Comment </a>
                                   <a href="#">  Share </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="bg-gray-200 max-w-full lg:h-44 h-36 rounded-lg relative overflow-hidden shadow uk-transition-toggle">
                            <img src="{{asset('assets/images/post/img-2.jpg')}}" class="w-full h-full absolute object-cover inset-0">
                            <!-- overly-->
                            <div class="-bottom-12 absolute bg-gradient-to-b from-transparent h-1/2 to-gray-800 uk-transition-slide-bottom-small w-full"></div>
                            <div class="absolute bottom-0 w-full p-3 text-white uk-transition-slide-bottom-small">
                                <div class="text-base"> Image description  </div>
                                <div class="flex justify-between text-xs">
                                   <a href="#">  Like</a>
                                   <a href="#">  Comment </a>
                                   <a href="#">  Share </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="bg-gray-200 max-w-full lg:h-44 h-36 rounded-lg relative overflow-hidden shadow uk-transition-toggle">
                            <img src="{{asset('assets/images/avatars/avatar-3.jpg')}}" class="w-full h-full absolute object-cover inset-0">
                            <!-- overly-->
                            <div class="-bottom-12 absolute bg-gradient-to-b from-transparent h-1/2 to-gray-800 uk-transition-slide-bottom-small w-full"></div>
                            <div class="absolute bottom-0 w-full p-3 text-white uk-transition-slide-bottom-small">
                                <div class="text-base"> Image description  </div>
                                <div class="flex justify-between text-xs">
                                   <a href="#">  Like</a>
                                   <a href="#">  Comment </a>
                                   <a href="#">  Share </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="bg-gray-200 max-w-full lg:h-44 h-36 rounded-lg relative overflow-hidden shadow uk-transition-toggle">
                            <img src="{{asset('assets/images/post/img-4.jpg')}}" class="w-full h-full absolute object-cover inset-0">
                            <!-- overly-->
                            <div class="-bottom-12 absolute bg-gradient-to-b from-transparent h-1/2 to-gray-800 uk-transition-slide-bottom-small w-full"></div>
                            <div class="absolute bottom-0 w-full p-3 text-white uk-transition-slide-bottom-small">
                                <div class="text-base"> Image description  </div>
                                <div class="flex justify-between text-xs">
                                   <a href="#">  Like</a>
                                   <a href="#">  Comment </a>
                                   <a href="#">  Share </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="bg-gray-200 max-w-full lg:h-44 h-36 rounded-lg relative overflow-hidden shadow uk-transition-toggle">
                            <img src="{{asset('assets/images/avatars/avatar-7.jpg')}}" class="w-full h-full absolute object-cover inset-0">
                            <!-- overly-->
                            <div class="-bottom-12 absolute bg-gradient-to-b from-transparent h-1/2 to-gray-800 uk-transition-slide-bottom-small w-full"></div>
                            <div class="absolute bottom-0 w-full p-3 text-white uk-transition-slide-bottom-small">
                                <div class="text-base"> Image description  </div>
                                <div class="flex justify-between text-xs">
                                   <a href="#">  Like</a>
                                   <a href="#">  Comment </a>
                                   <a href="#">  Share </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="bg-gray-200 max-w-full lg:h-44 h-36 rounded-lg relative overflow-hidden shadow uk-transition-toggle">
                            <img src="{{asset('assets/images/avatars/avatar-4.jpg')}}" class="w-full h-full absolute object-cover inset-0">
                            <!-- overly-->
                            <div class="-bottom-12 absolute bg-gradient-to-b from-transparent h-1/2 to-gray-800 uk-transition-slide-bottom-small w-full"></div>
                            <div class="absolute bottom-0 w-full p-3 text-white uk-transition-slide-bottom-small">
                                <div class="text-base"> Image description  </div>
                                <div class="flex justify-between text-xs">
                                   <a href="#">  Like</a>
                                   <a href="#">  Comment </a>
                                   <a href="#">  Share </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="bg-gray-200 max-w-full lg:h-44 h-36 rounded-lg relative overflow-hidden shadow uk-transition-toggle">
                            <img src="{{asset('assets/images/post/img-1.jpg')}}" class="w-full h-full absolute object-cover inset-0">
                            <!-- overly-->
                            <div class="-bottom-12 absolute bg-gradient-to-b from-transparent h-1/2 to-gray-800 uk-transition-slide-bottom-small w-full"></div>
                            <div class="absolute bottom-0 w-full p-3 text-white uk-transition-slide-bottom-small">
                                <div class="text-base"> Image description  </div>
                                <div class="flex justify-between text-xs">
                                   <a href="#">  Like</a>
                                   <a href="#">  Comment </a>
                                   <a href="#">  Share </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="bg-gray-200 max-w-full lg:h-44 h-36 rounded-lg relative overflow-hidden shadow uk-transition-toggle">
                            <img src="{{asset('assets/images/post/img-2.jpg')}}" class="w-full h-full absolute object-cover inset-0">
                            <!-- overly-->
                            <div class="-bottom-12 absolute bg-gradient-to-b from-transparent h-1/2 to-gray-800 uk-transition-slide-bottom-small w-full"></div>
                            <div class="absolute bottom-0 w-full p-3 text-white uk-transition-slide-bottom-small">
                                <div class="text-base"> Image description  </div>
                                <div class="flex justify-between text-xs">
                                   <a href="#">  Like</a>
                                   <a href="#">  Comment </a>
                                   <a href="#">  Share </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-6">
                    <a href="#" class="bg-white dark:bg-gray-900 font-semibold my-3 px-6 py-2 rounded-full shadow-md dark:bg-gray-800 dark:text-white">
                        Load more ..</a>
                </div>

            </div>

            <!-- Profile  -->
            <div class="card md:p-6 p-2 max-w-3xl mx-auto">

                <div class="mt-5">

                    {{-- details of user here --}}
                    <div class="flex justify-between mt-5">
                        <div><strong>Education: </strong></div>
                        <div>{{ $user->education }}</div>
                    </div>

                    <div class="flex justify-between mt-5">
                        <div><strong>Date Of Birth: </strong></div>
                        <div>{{ $user->birthday }}</div>
                    </div>

                    <div class="flex justify-between mt-5">
                        <div><strong>Gender: </strong></div>
                        <div>{{ $user->gender }}</div>
                    </div>

                    <div class="flex justify-between mt-5">
                        <div><strong>Email: </strong></div>
                        <div>{{ $user->email }}</div>
                    </div>

                    <div class="flex justify-between mt-5">
                        <div><strong>Relationship: </strong></div>
                        <div>{{ $user->relationship }}</div>
                    </div>

                    <div class="flex justify-between mt-5">
                        <div><strong>Username: </strong></div>
                        <div>{{ $user->username }}</div>
                    </div>


                </div>


            </div>


        </div>

    </div>
</div>




@endsection
