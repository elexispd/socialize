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
                @if (auth()->user()->id != $user->id)

                    @if (auth()->user()->isFriendWith($user) )
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


                @include('partials._timeline_posts')




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
