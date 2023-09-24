@extends('layouts.layout')

@section('content')

     <!-- Main Contents -->
     <div class="main_content">
        <div class="mcontainer">

            <div class="lg:flex lg:space-x-10">

                <div class="lg:w-2/3">
                    <h2 class="text-xl font-semibold"> Add Users </h2>
                    <div class="relative" uk-slider="finite: true">
                        <div class="uk-slider-container px-1 py-3">
                            <ul class="uk-slider-items uk-child-width-1-3@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid-small uk-grid">

                              @foreach ($usersNotFriendsWithLoggedInUser as $user)
                                <li>
                                    <a href="{{ Route('timeline', $user->username) }}" class="uk-link-reset">
                                        <div class="card">
                                            <img src="{{ asset('useravatar/default.jpg') }}" class="h-44 object-cover rounded-t-md shadow-sm w-full">
                                            <div class="p-4">
                                                <h4 class="text-base font-semibold mb-1"> {{ $user->firstname }}  {{ $user->lastname }}</h4>
                                                <a href="#" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-sm text-xs">Add Friends</a>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                              @endforeach

                            </ul>

                            <a class="absolute bg-white bottom-1/2 flex items-center justify-center p-2 -left-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
                                href="#" uk-slider-item="previous"> <i class="icon-feather-chevron-left"></i></a>
                            <a class="absolute bg-white bottom-1/2 flex items-center justify-center p-2 -right-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
                                href="#" uk-slider-item="next"> <i class="icon-feather-chevron-right"></i></a>

                        </div>
                    </div>

                    <br>

                    <div class="my-2 flex items-center justify-between pb-3">
                       <div>
                           <h2 class="text-xl font-semibold"> People You May Know</h2>

                       </div>

                    </div>

                    @if ($friendsOfFriends->isEmpty())
                    <p class="text-center text-gray-500">You have no friend suggestion</p>
                    @else
                        <div class="relative" uk-slider="finite: true">
                        <div class="uk-slider-container px-1 py-3">
                            <ul class="uk-slider-items uk-child-width-1-3@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid-small uk-grid">

                                @foreach ($friendsOfFriends as $friendOfFriends)
                                    <li>
                                        <a href="{{ Route('timeline', $friendOfFriends->username) }}">
                                            <div class="card">
                                                <img src="{{ asset('useravatar/default.jpg') }}" class="h-44 object-cover rounded-t-md shadow-sm w-full">
                                                <div class="p-4">
                                                    <h4 class="text-base font-semibold mb-1"> {{ $friendOfFriends->firstname }} {{ $friendOfFriends->lastname }} </h4>
                                                    <a href="#" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-sm text-xs">Add Friends</a>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>

                            <a class="absolute bg-white bottom-1/2 flex items-center justify-center p-2 -left-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
                                href="#" uk-slider-item="previous"> <i class="icon-feather-chevron-left"></i></a>
                            <a class="absolute bg-white bottom-1/2 flex items-center justify-center p-2 -right-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
                                href="#" uk-slider-item="next"> <i class="icon-feather-chevron-right"></i></a>

                        </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="lg:w-1/3 w-full">
                    <div uk-sticky="media @m ; offset:80 ; bottom : true" class="card">


                        <div class="border-b flex items-center justify-between p-4">
                            <div>
                                <h5 class="text-lg font-semibold">Friend Requests</h2>
                            </div>

                        </div>

                        <div class="p-4 -mt-1.5">

                            @if ($requests->isEmpty())
                                <p class="text-center text-gray-500">You have no friend requests</p>
                            @else
                                    @foreach ($requests as $request)
                                    <div class="flex items-center space-x-4 rounded-md -mx-2 p-2 hover:bg-gray-50">
                                        <a href="#" class="w-12 h-12 flex-shrink-0 overflow-hidden rounded-full relative">
                                            <img src="{{ asset('useravatar/default.jpg') }} " class="absolute w-full h-full inset-0" alt="">
                                        </a>
                                        <div class="flex-1">
                                            <a href="#" class="text-base font-semibold capitalize"> {{ $request->firstname }}  {{ $request->lastname }} </a>
                                        </div>
                                        <ul>
                                            <li>
                                                <a href="#"
                                                    class="flex items-center justify-center h-8 px-3 rounded-md text-sm border font-semibold">
                                                    Accept
                                                </a>
                                            </li>
                                            <li class="mt-2">
                                                <a href="#"
                                                    class="flex items-center justify-center h-8 px-3 rounded-md text-sm border font-semibold">
                                                    Decline
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                @endforeach
                                <a href="#" class="block text-center pb-4 font-medium text-blue-500"> See all </a>
                            @endif





                        </div>



                    </div>
                </div>

            </div>


        </div>
    </div>

@endsection
