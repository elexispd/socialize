<div class="card lg:mx-0 uk-animation-slide-bottom-small">

    <!-- post header-->
    <div class="flex justify-between items-center lg:p-4 p-2.5">
        <div class="flex flex-1 items-center space-x-4">
            <a href="#">
                <img src="{{ auth()->user()->getAvatar() }}" class="bg-gray-200 border border-white rounded-full w-10 h-10">
            </a>
            <div class="flex-1 font-semibold capitalize">
                <a href="{{ Route('myTimeline') }}" class="text-black dark:text-gray-100"> 
                    @auth
                        {{ auth()->user()->getFullname() }}
                    @endauth
                 </a>
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
        <a href="images/avatars/avatar-lg-3.jpg">  
            <img src="images/avatars/avatar-lg-4.jpg" alt="" class="max-h-96 w-full object-cover">
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
                <img src="images/avatars/avatar-1.jpg" alt="" class="w-6 h-6 rounded-full border-2 border-white dark:border-gray-900">
                <img src="images/avatars/avatar-4.jpg" alt="" class="w-6 h-6 rounded-full border-2 border-white dark:border-gray-900 -ml-2">
                <img src="images/avatars/avatar-2.jpg" alt="" class="w-6 h-6 rounded-full border-2 border-white dark:border-gray-900 -ml-2">
            </div>
            <div class="dark:text-gray-100">
                Liked <strong> Johnson</strong> and <strong> 209 Others </strong>
            </div>
        </div>

        <div class="border-t py-4 space-y-4 dark:border-gray-600">
            <div class="flex">
                <div class="w-10 h-10 rounded-full relative flex-shrink-0">
                    <img src="images/avatars/avatar-1.jpg" alt="" class="absolute h-full rounded-full w-full">
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
                    <img src="images/avatars/avatar-1.jpg" alt="" class="absolute h-full rounded-full w-full">
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