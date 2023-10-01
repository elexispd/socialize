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
                </div>
                <div class="bg-white rounded-md lg:shadow-md shadow col-span-2 lg:mx-16">
                    @if (session('success'))
                        <div class="bg-green-500 text-white p-4 rounded-md">
                            {{ session('success') }}
                        </div>
                    @elseif (session('info'))
                        <div class="bg-blue-500 text-white p-4 rounded-md">
                            {{ session('info') }}
                        </div>
                    @endif

                    <form method="post" action="{{ route('update_profile') }}">
                        @csrf
                        @method("PUT")
                        <div class="grid grid-cols-2 gap-3 lg:p-6 p-4">
                            <div>
                                <label for=""> First name</label>
                                <input type="text" placeholder="" class="shadow-none with-border" name="firstname" value="{{ auth()->user()->firstname }}">
                                @error('firstname')
                                    <span class="invalid-feedback text-red-400" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div>
                                <label for=""> Last name</label>
                                <input type="text" placeholder="" class="shadow-none with-border" name="lastname" value="{{ auth()->user()->lastname }}">
                                @error('lastname')
                                    <span class="invalid-feedback text-red-400" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                    <label for=""> Email</label>
                                    <input type="text" type="email" placeholder="" name="email" class="shadow-none with-border"  value="{{ auth()->user()->email }}">
                                    @error('email')
                                    <span class="invalid-feedback text-red-400" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label for="about">About me</label>
                                <textarea id="about" name="about" rows="3" name="about"  class="with-border align-top">{{ auth()->user()->about  }}</textarea>
                                @error('about')
                                    <span class="invalid-feedback text-red-400" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                    <label for="about">Education</label>
                                    <input type="text" placeholder="" name="education" class="shadow-none with-border" value="{{ auth()->user()->education }}">
                                @error('education')
                                    <span class="invalid-feedback text-red-400" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                    <label for=""> Location</label>
                                    <input type="text" placeholder="" name="location" class="shadow-none with-border" value="{{ auth()->user()->location }}">
                                @error('location')
                                    <span class="invalid-feedback text-red-400" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div>
                                    <label for=""> Working at</label>
                                     <input type="text" placeholder="" name="workplace" class="shadow-none with-border" value="{{ auth()->user()->workplace }}">
                                @error('workplace')
                                    <span class="invalid-feedback text-red-400" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div>
                                <label for="">Phone Number</label>
                                 <input type="text" placeholder="" name="phone_number" class="shadow-none with-border" value="{{ auth()->user()->phone_number }}">
                                @error('phone_number')
                                    <span class="invalid-feedback text-red-400" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div>
                                <label for=""> Date Of Birth</label>
                                 <input type="date" placeholder="" name="birthday" class="shadow-none with-border" value="{{ auth()->user()->birthday }}">
                                @error('birthday')
                                    <span class="invalid-feedback text-red-400" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div>
                                <label for=""> Relationship </label>
                                <select id="relationship" name="relationship" class="shadow-none with-border">
                                    @php
                                        $userRelationship = auth()->user()->relationship ?? 0;
                                    @endphp

                                    <option value="" {{ $userRelationship == '' ? 'selected' : '' }}>None</option>
                                    <option value="single" {{ $userRelationship == 'single' ? 'selected' : '' }}>Single</option>
                                    <option value="in a relationship" {{ $userRelationship == 'in a relationship' ? 'selected' : '' }}>In a relationship</option>
                                    <option value="engaged" {{ $userRelationship == 'engaged' ? 'selected' : '' }}>Engaged</option>
                                    <option value="married" {{ $userRelationship == 'married' ? 'selected' : '' }}>Married</option>
                                    <option value="divorced" {{ $userRelationship == 'divorced' ? 'selected' : '' }}>Divorced</option>
                                </select>

                            </div>
                        </div>

                        <div class="bg-gray-10 p-6 pt-0 flex justify-end space-x-3">
                            <button class="p-2 px-4 rounded bg-gray-50 text-red-500"> Cancel </button>
                            <button type="submit" class="button bg-blue-700"> Save </button>
                        </div>

                    </form>
                </div>

                <div>
                    <h3 class="text-xl mb-2 font-semibold"> Privacy</h3>
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



