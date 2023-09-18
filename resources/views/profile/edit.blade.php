@extends("layouts.layout")

@section("content")

    <!-- Main Contents -->
    <div class="main_content">
        <div class="mcontainer">

            <div class="mb-6">
                <h2 class="text-2xl font-semibold"> Setting </h2>
                <nav class="responsive-nav border-b md:m-0 -mx-4">
                    <ul uk-switcher="connect: #form-type; animation: uk-animation-fade">
                        <li><a href="#" class="lg:px-2"> Profile</a></li>
                        <li><a href="#" class="lg:px-2"> Privacy</a></li>
                        <li><a href="#" class="lg:px-2"> Notification</a></li>
                        <li><a href="#" class="lg:px-2"> Social links </a></li>
                        <li><a href="#" class="lg:px-2"> Billing </a></li>
                        <li><a href="#" class="lg:px-2"> Security </a></li>
                    </ul>
                </nav>
            </div>

            <div class="grid lg:grid-cols-3 mt-12 gap-8">
                <div>
                    <h3 class="text-xl mb-2 font-semibold"> Basic</h3>
                    <p> Lorem ipsum dolor sit amet nibh consectetuer adipiscing elit</p>
                </div>
                <div class="bg-white rounded-md lg:shadow-md shadow col-span-2 lg:mx-16">

                    <div class="grid grid-cols-2 gap-3 lg:p-6 p-4">
                        <div>
                            <label for=""> First name</label>
                            <input type="text" placeholder="" class="shadow-none with-border">
                        </div>
                        <div>
                            <label for=""> Last name</label>
                            <input type="text" placeholder="" class="shadow-none with-border">
                            </div>
                            <div class="col-span-2">
                                <label for=""> Email</label>
                                <input type="text" type="email" placeholder="" class="shadow-none with-border">
                            </div>
                            <div class="col-span-2">
                                <label for="about">About me</label>
                                <textarea id="about" name="about" rows="3"  class="with-border"></textarea>
                            </div>
                            <div class="col-span-2">
                                <label for=""> Location</label>
                                <input type="text" placeholder="" class="shadow-none with-border">
                            </div>
                            <div>
                            <label for=""> Working at</label>
                            <input type="text" placeholder="" class="shadow-none with-border">
                            </div>
                        <div>
                            <label for=""> Relationship </label>
                            <select id="relationship" name="relationship"  class="shadow-none  with-border ">
                                <option value="0">None</option>
                                <option value="1">Single</option>
                                <option value="2">In a relationship</option>
                                <option value="3">Engaged</option>
                                <option value="4">Married</option>
                                <option value="5">Divorced</option>
                            </select>
                        </div>
                    </div>

                    <div class="bg-gray-10 p-6 pt-0 flex justify-end space-x-3">
                        <button class="p-2 px-4 rounded bg-gray-50 text-red-500"> Cancel </button>
                        <button type="button" class="button bg-blue-700"> Save </button>
                    </div>

                    </div>

                <div>
                    <h3 class="text-xl mb-2 font-semibold"> Privacy</h3>
                    <p> Lorem ipsum dolor sit amet nibh consectetuer adipiscing elit</p>
                </div>
                <div class="bg-white rounded-md lg:shadow-lg shadow col-span-2 lg:p-6 p-4 lg:mx-16">

                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <div>
                            <h4> Who can follow me ?</h4>
                            <div> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, </div>
                        </div>
                        <div class="switches-list -mt-8 is-large">
                            <div class="switch-container">
                                <label class="switch"><input type="checkbox"><span class="switch-button"></span> </label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="flex justify-between items-center">
                        <div>
                            <h4> Show my activities ?</h4>
                            <div> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, </div>
                        </div>
                        <div class="switches-list -mt-8 is-large">
                            <div class="switch-container">
                                <label class="switch"><input type="checkbox" checked><span class="switch-button"></span> </label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="flex justify-between items-center">
                        <div>
                            <h4> Search engines?</h4>
                            <div> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, </div>
                        </div>
                        <div class="switches-list -mt-8 is-large">
                            <div class="switch-container">
                                <label class="switch"><input type="checkbox"><span class="switch-button"></span> </label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="flex justify-between items-center">
                        <div>
                            <h4> Allow Commenting?</h4>
                            <div> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, </div>
                        </div>
                        <div class="switches-list -mt-8 is-large">
                            <div class="switch-container">
                                <label class="switch"><input type="checkbox"><span class="switch-button"></span> </label>
                            </div>
                        </div>
                    </div>
                </div>

                </div>

            </div>

        </div>
    </div>

@endsection



