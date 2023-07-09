<div class="sidebar"> 
    <div class="sidebar_inner" data-simplebar>

        <ul>
            <li class="active"><a href="{{Route('feed')}}"> 
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-blue-600"> 
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
                <span> Feed </span> </a> 
            </li>
            <li><a href="{{Route('explore')}}"> 
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-yellow-500">
                    <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd"></path>
                </svg> 
                <span> Explore </span> </a> 
            </li>
            <li><a href="">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-red-500">
                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm3 2h6v4H7V5zm8 8v2h1v-2h-1zm-2-2H7v4h6v-4zm2 0h1V9h-1v2zm1-4V5h-1v2h1zM5 5v2H4V5h1zm0 4H4v2h1V9zm-1 4h1v2H4v-2z" clip-rule="evenodd" />
                </svg>
                <span> Video</span></a> 
            </li> 
            <li><a href=""> 
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-blue-500">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                </svg><span> Groups </span></a> 
            </li>
            <li><a href=""> 
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-pink-500">
                    <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                    <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                </svg> <span> Jobs</span> </a> 
            </li> 
            
        </ul>

        
        
        <h3 class="side-title"> Contacts </h3>

        <div class="contact-list my-2 ml-1">
            
            <a href="{{ Route("messages") }}">
                <div class="contact-avatar">
                    <img src="images/avatars/avatar-1.jpg" alt="">
                    <span class="user_status status_online"></span>
                </div>
                <div class="contact-username"> Dennis Han</div>
            </a>
            <a href="chats-friend.html">
                <div class="contact-avatar">
                    <img src="images/avatars/avatar-2.jpg" alt="">
                    <span class="user_status"></span>
                </div>
                <div class="contact-username"> Erica Jones</div>
            </a>
            <a href="chats-friend.html">
                <div class="contact-avatar">
                    <img src="images/avatars/avatar-7.jpg" alt="">
                </div>
                <div class="contact-username">Stella Johnson</div>
            </a>
            <a href="chats-friend.html">
                <div class="contact-avatar">
                    <img src="images/avatars/avatar-4.jpg" alt="">
                </div>
                <div class="contact-username"> Alex Dolgove</div>
            </a>

        </div>

            <a href="feed.html"> 
                Settings
            </a>  
    </div>

    <!-- sidebar overly for mobile -->
    <div class="side_overly" uk-toggle="target: #wrapper ; cls: is-collapse is-active"></div>

</div> 