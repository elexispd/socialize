<!-- create post -->
<div class="card lg:mx-0 p-4" uk-toggle="target: #create-post-modal">
    <div class="flex space-x-3">
        <img src="{{ auth()->user()->getAvatar() }}" class="w-10 h-10 rounded-full">
        <input placeholder="What's On Your Mind ? " class="bg-gray-100 hover:bg-gray-200 flex-1 h-10 px-6 rounded-full">
    </div>
    <div class="grid grid-flow-col pt-3 -mx-1 -mb-1 font-semibold text-sm">
        <div class="hover:bg-gray-100 flex items-center p-1.5 rounded-md cursor-pointer">
            <svg class="bg-blue-100 h-9 mr-2 p-1.5 rounded-full text-blue-600 w-9 -my-0.5 hidden lg:block" data-tippy-placement="top" title="Tooltip" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            Photo/Video
        </div>
        <div class="hover:bg-gray-100 flex items-center p-1.5 rounded-md cursor-pointer">
            <svg class="bg-green-100 h-9 mr-2 p-1.5 rounded-full text-green-600 w-9 -my-0.5 hidden lg:block" uk-tooltip="title: Messages ; pos: bottom ;offset:7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" title="" aria-expanded="false"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
            Tag Friend
        </div>

    </div>
</div>

 <!-- Craete post modal -->
 <div id="create-post-modal" class="create-post is-story" uk-modal>
    <div
        class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical rounded-lg p-0 lg:w-5/12 relative shadow-2xl uk-animation-slide-bottom-small">

        <div class="text-center py-3 border-b">
            <h3 class="text-lg font-semibold"> Create Post </h3>
            <button class="uk-modal-close-default bg-gray-100 rounded-full p-2.5 right-2" type="button" uk-close uk-tooltip="title: Close ; pos: bottom ;offset:7"></button>
        </div>
        <form action="{{ route('post') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-1 items-start space-x-4 p-5">

            <img src="{{ auth()->user()->getAvatar() }}"
                class="bg-gray-200 border border-white rounded-full w-11 h-11">
            <div class="flex-1 pt-2">
                <textarea class="uk-textarea content_bg_inherit  text-white shadow-none focus:shadow-none text-xl font-medium resize-none h-full w-full" name="content" rows="5" id="content"
                    placeholder="What's Your Mind ? {{ auth()->user()->firstname  }}" ></textarea>

                <input type="text" name="post_bg" id="postBgID" value="bg-black" hidden>
            </div>

            </div>
            <div class="bsolute bottom-0 p-4 space-x-4 w-full">
                <div class="flex bg-gray-50 border border-purple-100 rounded-2xl p-2 shadow-sm items-center">
                    <div class="lg:block hidden ml-1"> Add to your post </div>
                    <div class="flex flex-1 items-center lg:justify-end justify-center space-x-2">

                        <svg class="bg-blue-100 h-9 p-1.5 rounded-full text-blue-600 w-9 cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <svg class="text-red-600 h-9 p-1.5 rounded-full bg-red-100 w-9 cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"> </path></svg>
                        <svg class="text-green-600 h-9 p-1.5 rounded-full bg-green-100 w-9 cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>

                        <div id="background" class="flex flex-1 items-center lg:justify-end justify-center space-x-2">
                            <svg class="text-red-600 h-9 p-1.5 rounded-full bg-red-400 bg_post w-9 cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" data-colour="bg-red-400"> </svg>

                            <svg class="text-green-600 h-9 p-1.5 rounded-full bg-green-400 bg_post w-9 cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" data-colour="bg-green-400" > </svg>

                            <svg class="text-white-600 h-9 p-1.5 rounded-full bg-purple-400 bg_post w-9 cursor-pointer" fill="none" stroke="currentColor"  viewBox="0 0 24 24" data-colour="bg-purple-400"> </svg>

                            <svg class="text-white-600 h-9 p-1.5 rounded-full bg-blue-400 bg_post w-9 cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" data-colour="bg-blue-400"> </svg>

                            <svg class="text-white-600 h-9 p-1.5 rounded-full bg-yellow-400 w-9 bg_post cursor-pointer" fill="none" stroke="currentColor"  viewBox="0 0 24 24" data-colour="bg-yellow-400"> </svg>
                        </div>


                    </div>

                </div>
            </div>
            <div class="text-red-500 text-center">
                @error('content')
                    {{ $message }}
                @enderror
            </div>
            <div class="flex items-center w-full justify-between border-t p-3">

                <select class="selectpicker mt-2 story">
                    <option>Only me</option>
                    <option>Every one</option>
                    <option>People I Follow </option>
                    <option>People Follow Me</option>
                </select>

                <div class="flex space-x-2">
                    <a href="#" class="bg-red-100 flex font-medium h-9 items-center justify-center px-5 rounded-md text-red-600 text-sm">
                        <svg class="h-5 pr-1 rounded-full text-red-500 w-6 fill-current" id="veiw-more" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="false" style=""> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Live </a>
                    <button type="submit" class="bg-blue-600 flex h-9 items-center justify-center rounded-md text-white px-5 font-medium">
                    Share </a>
                </div>

                <a href="#" hidden
                    class="bg-blue-600 flex h-9 items-center justify-center rounded-lg text-white px-12 font-semibold">
                    Share </a>
            </div>
        </form>
    </div>
</div>


<script>

    $(document).ready(function(){
        function toggleSvgVisibility() {
            var textareaValue = $('#content').val();
            var textareaLength = textareaValue.length;

            // Conditionally show SVG elements based on textarea length
            if (textareaLength >= 150) {
                // Show the desired SVG elements
                $('#background').hide();
                $('#content').removeClass(function(index, classNames) {
                return classNames.split(' ').filter(function(className) {
                    return className.startsWith('bg-');
                }).join(' ');
            });
                $('#content').addClass('content')
            } else {
                $('#background').show();
            }
            $('#content').css('color', 'white');
        }

        // Bind the function to textarea input event
        $('#content').on('input', toggleSvgVisibility);


        function postBg($colour) {
            $('#content').addClass($colour);
        }

        $(".bg_post").click(function() {
            var colour = $(this).data("colour");
            // Remove existing background color classes that start with 'bg-'
            $('#content').removeClass(function(index, classNames) {
                return classNames.split(' ').filter(function(className) {
                    return className.startsWith('bg-');
                }).join(' ');
            });
            $('#content').removeClass('content_bg_inherit');
            $('#content').addClass(colour);
            $('#content').addClass('content-colour');
            $('#content').addClass('content');
            $('#postBgID').val(colour);
        })

    })
</script>
