@extends('theme.layout')
@extends('theme.sidebar')
@section('content')

    <!-- Main Header Account -->

    <div class="main-header">
        <div class="content-bg-wrap">
            <div class="content-bg bg-account"></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto col-md-8 col-sm-12 col-xs-12">
                    <div class="main-header-content">
                        <h1>Your Account Dashboard</h1>
                        <p>Welcome to your account dashboard! Here you’ll find everything you need to change your profile
                            information, settings, read notifications and requests, view your latest messages, change your pasword and much
                            more! Also you can create or manage your own favourite page, have fun!</p>
                    </div>
                </div>
            </div>
        </div>
        <img class="img-bottom" src="{{ asset('img/account-bottom.png')}}" alt="friends">
    </div>

    <!-- ... end Main Header Account -->



    <!-- Your Account Personal Information -->

    <div class="container">
        <div class="row">
            <div class="col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-xs-12">
                <div class="ui-block">

                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane fade show active" id="v-pills-pprofile" role="tabpanel" aria-labelledby="v-pills-pprofile-tab">
                            <profile-info>    </profile-info>

                            {{--<form class="form-horizontal editprofile" method="POST" action={{url("/editprofile")}} enctype="multipart/form-data">--}}
                                {{--{{ csrf_field() }}--}}

                                {{--<div class="form-group{{ $errors->has('nickname') ? ' has-error' : '' }}">--}}
                                    {{--<label for="nickname" class="col-md-4 control-label">{{trans('editprofile.Nick-name')}}</label>--}}

                                    {{--<div class="col-md-6">--}}
                                        {{--<input id="nickname" type="text" class="form-control" name="nickname" value="{{$profile->nickname}}" autofocus>--}}

                                        {{--@if ($errors->has('nickname'))--}}
                                            {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('nickname') }}</strong>--}}
                                    {{--</span>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="form-group{{ $errors->has('work') ? ' has-error' : '' }}">--}}
                                    {{--<label for="work" class="col-md-4 control-label">{{trans('editprofile.work')}}</label>--}}

                                    {{--<div class="col-md-6">--}}
                                        {{--<input id="work" type="text" class="form-control" name="work" value="{{$profile->work}}" autofocus>--}}

                                        {{--@if ($errors->has('work'))--}}
                                            {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('work') }}</strong>--}}
                                    {{--</span>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="form-group{{ $errors->has('lacation') ? ' has-error' : '' }}">--}}
                                    {{--<label for="lacation" class="col-md-4 control-label">{{trans('editprofile.lacation')}}</label>--}}

                                    {{--<div class="col-md-6">--}}
                                        {{--<input id="lacation" type="text" class="form-control" name="lacation" value="{{$profile->lacation}}" autofocus>--}}

                                        {{--@if ($errors->has('lacation'))--}}
                                            {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('lacation') }}</strong>--}}
                                    {{--</span>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}


                                {{--<div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">--}}
                                    {{--<label for="bio" class="col-md-4 control-label">{{trans('editprofile.Bio')}}</label>--}}

                                    {{--<div class="col-md-6">--}}
                                     {{--<textarea rows="3" id='article-ckeditor'  class="form-control" name="bio" id="bio">{{$profile->bio}}</textarea>--}}

                                        {{--@if ($errors->has('bio'))--}}
                                            {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('bio') }}</strong>--}}
                                    {{--</span>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}


                                {{--<div class="form-group{{ $errors->has('profile_pic') ? ' has-error' : '' }}">--}}
                                    {{--<label for="cover_pic" class="col-md-4 control-label">{{trans('editprofile.Cover pic')}}</label>--}}

                                    {{--<div class="col-md-6">--}}
                                        {{--<input id="cover_pic" type="file" class="form-control" name="cover_pic">--}}

                                        {{--@if ($errors->has('cover_pic'))--}}
                                            {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('cover_pic') }}</strong>--}}
                                    {{--</span>--}}
                                        {{--@endif--}}
                                        {{--<br>--}}
                                        {{--<img class="edit_cover" src="../img/{{$profile['cover_pic']}}">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                    {{--<div class="col-md-8 col-md-offset-4">--}}
                                        {{--<button type="submit" class="btn btn-primary">--}}
                                            {{--{{trans('editprofile.Save Changes')}}--}}
                                        {{--</button>--}}



                                        {{--</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</form>--}}


                            </div>
                        <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

                            <personal-info>    </personal-info>
                            {{--<form action={{url("/settings/".$user_profile->id)}} method="post">--}}
                                {{--{{ csrf_field() }}--}}

                                {{--<fieldset class="form-group">--}}
                                    {{--<label for="name" class="col-md-3 control-label setting">{{trans('editprofile.Name')}}</label>--}}
                                    {{--<div class="col-md-8 setting_div">--}}
                                        {{--<input id="name" type="text" class="form-control" name="name" value="{{$user_profile->name}}" placeholder="name"--}}
                                               {{--required>--}}
                                    {{--</div>--}}
                                {{--</fieldset>--}}
                                {{--<fieldset class="form-group">--}}
                                    {{--<label for="fullname" class="col-md-3 control-label setting">{{trans('editprofile.Username')}}</label>--}}
                                    {{--<div class="col-md-8 setting_div">--}}
                                        {{--<input id="username" type="text" class="form-control" name="username" value="{{$user_profile->username}}" placeholder="username"--}}
                                               {{--required>--}}
                                    {{--</div>--}}
                                {{--</fieldset>--}}
                                {{--<fieldset class="form-group">--}}
                                    {{--<label for="email" class="col-md-3 control-label setting">{{trans('editprofile.Email')}}</label>--}}
                                    {{--<div class="col-md-8 setting_div">--}}
                                        {{--<input id="email" type="email" class="form-control" value="{{$user_profile->email}}" name="email" placeholder="email"--}}
                                               {{--required>--}}
                                    {{--</div>--}}
                                {{--</fieldset>--}}
                                {{--<fieldset class="form-group">--}}
                                    {{--<label for="phone" class="col-md-3 control-label setting">{{trans('editprofile.Phone number')}}</label>--}}
                                    {{--<div class="col-md-8 setting_div">--}}
                                        {{--<input id="phone" class="form-control" type="number" value="{{$user_profile->phone}}" name="phone" placeholder="phone number"  required>--}}
                                    {{--</div>--}}
                                {{--</fieldset>--}}
                                {{--<fieldset class="form-group">--}}
                                    {{--<label for="lang" class="col-md-1 control-label setting">{{trans('editprofile.Lang')}}</label>--}}
                                    {{--<div class="col-md-8 setting_div">--}}
                                        {{--<select name="lang" class="col-md-4 form-control">--}}
                                            {{--<option selected disabled>{{$user_profile->lang}}</option>--}}
                                            {{--<option value="ar">ar</option>--}}
                                            {{--<option value="en">en</option>--}}
                                        {{--</select>--}}
                                        {{--@if ($errors->has('lang'))--}}
                                            {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('lang') }}</strong>--}}
                                    {{--</span>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</fieldset>--}}
                                {{--<button class="btn btn-primary">Save Changes</button>--}}
                            {{--</form>--}}

                            </div>
                        {{--<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">--}}

                            {{--<div class="ui-block-title">--}}
                                {{--<h6 class="title">Account Settings</h6>--}}
                            {{--</div>--}}
                            {{--<div class="ui-block-content">--}}


                                {{--<!-- Personal Account Settings Form -->--}}

                                {{--<form>--}}
                                    {{--<div class="row">--}}

                                        {{--<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">--}}
                                            {{--<div class="form-group label-floating is-select">--}}
                                                {{--<label class="control-label">Who Can Friend You?</label>--}}
                                                {{--<select class="selectpicker form-control">--}}
                                                    {{--<option value="EO">Everyone</option>--}}
                                                    {{--<option value="NO">No One</option>--}}
                                                {{--</select>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">--}}
                                            {{--<div class="form-group label-floating is-select">--}}
                                                {{--<label class="control-label">Who Can View Your Posts</label>--}}
                                                {{--<select class="selectpicker form-control">--}}
                                                    {{--<option value="US">Friends Only</option>--}}
                                                    {{--<option value="EO">Everyone</option>--}}
                                                {{--</select>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
                                            {{--<div class="description-toggle">--}}
                                                {{--<div class="description-toggle-content">--}}
                                                    {{--<div class="h6">Notifications Sound</div>--}}
                                                    {{--<p>A sound will be played each time you receive a new activity notification</p>--}}
                                                {{--</div>--}}

                                                {{--<div class="togglebutton">--}}
                                                    {{--<label>--}}
                                                        {{--<input type="checkbox" checked="">--}}
                                                    {{--</label>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="description-toggle">--}}
                                                {{--<div class="description-toggle-content">--}}
                                                    {{--<div class="h6">Notifications Email</div>--}}
                                                    {{--<p>We’ll send you an email to your account each time you receive a new activity notification</p>--}}
                                                {{--</div>--}}

                                                {{--<div class="togglebutton">--}}
                                                    {{--<label>--}}
                                                        {{--<input type="checkbox" checked="">--}}
                                                    {{--</label>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="description-toggle">--}}
                                                {{--<div class="description-toggle-content">--}}
                                                    {{--<div class="h6">Friend’s Birthdays</div>--}}
                                                    {{--<p>Choose wheather or not receive notifications about your friend’s birthdays on your newsfeed</p>--}}
                                                {{--</div>--}}

                                                {{--<div class="togglebutton">--}}
                                                    {{--<label>--}}
                                                        {{--<input type="checkbox" checked="">--}}
                                                    {{--</label>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="description-toggle">--}}
                                                {{--<div class="description-toggle-content">--}}
                                                    {{--<div class="h6">Chat Message Sound</div>--}}
                                                    {{--<p>A sound will be played each time you receive a new message on an inactive chat window</p>--}}
                                                {{--</div>--}}

                                                {{--<div class="togglebutton">--}}
                                                    {{--<label>--}}
                                                        {{--<input type="checkbox" checked="">--}}
                                                    {{--</label>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        {{--<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">--}}
                                            {{--<button class="btn btn-secondary btn-lg full-width">Restore all Attributes</button>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">--}}
                                            {{--<button class="btn btn-primary btn-lg full-width">Save all Changes</button>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</form>--}}

                                {{--<!-- ... end Personal Account Settings Form  -->--}}

                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                            <change-password>  </change-password>

                            {{--<form action={{url("/changepassword1")}} method="post" class="col-md-8">--}}
                                {{--{{ csrf_field() }}--}}

                                {{--<fieldset class="form-group">--}}
                                    {{--<input id="password" type="password" class="form-control" name="password"--}}
                                           {{--placeholder="{{trans('editprofile.Enter old password')}}"--}}
                                           {{--required>--}}

                                {{--</fieldset>--}}
                                {{--<fieldset class="form-group">--}}
                                    {{--<input id="newpassword" type="password" class="form-control" name="newpassword"--}}
                                           {{--placeholder="{{trans('editprofile.Enter new password')}}"--}}
                                           {{--required>--}}

                                {{--</fieldset>--}}
                                {{--<fieldset class="form-group">--}}
                                    {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation"--}}
                                           {{--placeholder="{{trans('editprofile.Confirm a password')}}"  required>--}}
                                {{--</fieldset>--}}

                                {{--<button class="btn btn-primary">--}}
                                    {{--{{trans('editprofile.Save Changes')}}--}}
                                {{--</button>--}}
                            {{--</form>--}}



                        </div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">4</div>


                    </div>
                </div>
            </div>

            <div class="col-xl-3 order-xl-1 col-lg-3 order-lg-1 col-md-12 order-md-2 col-sm-12 col-xs-12 responsive-display-none">
                <div class="ui-block">



                    <!-- Your Profile  -->

                    <div class="your-profile">
                        <div class="ui-block-title ui-block-title-small">
                            <h6 class="title">{{ trans('word.YOUR PROFILE')}}</h6>
                        </div>

                        <div id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="card">
                                <div class="card-header" role="tab" id="headingOne">
                                    <h6 class="mb-0">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            {{ trans('word.Profile Settings')}}
                                            <svg class="olymp-dropdown-arrow-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon')}}"></use></svg>
                                        </a>
                                    </h6>
                                </div>

                                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">

                                    <ul class="your-profile-menu">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                                            {{--<a href="28-YourAccount-PersonalInformation.html">Personal Information</a>--}}
                                            <a class="nav-link active" id="v-pills-pprofile-tab" data-toggle="pill"
                                               href="#v-pills-pprofile" role="tab" aria-controls="v-pills-pprofile"
                                               aria-selected="true">{{ trans('word.Profile Information')}}</a>

                                            <a class="nav-link" id="v-pills-home-tab" data-toggle="pill"
                                               href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                               aria-selected="false">{{ trans('word.Personal Information')}}</a>



                                            {{--<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill"--}}
                                               {{--href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"--}}
                                               {{--aria-selected="false">{{ trans('word.Account Settings')}}</a>--}}



                                            {{--<a href="30-YourAccount-ChangePassword.html">Change Password</a>--}}
                                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill"
                                               href="#v-pills-messages" role="tab" aria-controls="v-pills-messages"
                                               aria-selected="false">{{ trans('word.Change Password')}}</a>


                                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill"
                                               href="#v-pills-settings" role="tab" aria-controls="v-pills-settings"
                                               aria-selected="false">{{ trans('word.Education and Employement')}}</a>

                                            {{--<a href="32-YourAccount-EducationAndEmployement.html">Education and Employement</a>--}}

                                        </div>
                                    </ul>

                                </div>
                            </div>
                        </div>

                        <div class="ui-block-title">
                            <a href="33-YourAccount-Notifications.html" class="h6 title">{{ trans('word.Notifications')}}</a>
                            <a href="#" class="items-round-little bg-primary">8</a>
                        </div>
                        <div class="ui-block-title">
                            <a href="34-YourAccount-ChatMessages.html" class="h6 title">{{ trans('word.Chat / Messages')}}</a>
                        </div>
                        <div class="ui-block-title">
                            <a href="35-YourAccount-FriendsRequests.html" class="h6 title">{{ trans('word.Friend Requests')}}</a>
                            <a href="#" class="items-round-little bg-blue">4</a>
                        </div>
                        {{--<div class="ui-block-title ui-block-title-small">--}}
                            {{--<h6 class="title">FAVOURITE PAGE</h6>--}}
                        {{--</div>--}}
                        {{--<div class="ui-block-title">--}}
                            {{--<a href="36-FavPage-SettingsAndCreatePopup.html" class="h6 title">Create Fav Page</a>--}}
                        {{--</div>--}}
                        {{--<div class="ui-block-title">--}}
                            {{--<a href="36-FavPage-SettingsAndCreatePopup.html" class="h6 title">Fav Page Settings</a>--}}
                        {{--</div>--}}
                    </div>

                    <!-- ... end Your Profile  -->


                </div>
            </div>
        </div>
    </div>

    <!-- ... end Your Account Personal Information -->




    <!-- Window-popup-CHAT for responsive min-width: 768px -->

    <div class="ui-block popup-chat popup-chat-responsive">
        <div class="ui-block-title">
            <span class="icon-status online"></span>
            <h6 class="title" >Chat</h6>
            <div class="more">
                <svg class="olymp-three-dots-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
                <svg class="olymp-little-delete js-chat-open"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-little-delete')}}"></use></svg>
            </div>
        </div>
        <div class="mCustomScrollbar">
            <ul class="notification-list chat-message chat-message-field">
                <li>
                    <div class="author-thumb">
                        <img src="{{ asset('img/avatar14-sm.jpg')}}" alt="author" class="mCS_img_loaded">
                    </div>
                    <div class="notification-event">
                        <span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
                        <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
                    </div>
                </li>

                <li>
                    <div class="author-thumb">
                        <img src="{{ asset('img/author-page.jpg')}}" alt="author" class="mCS_img_loaded">
                    </div>
                    <div class="notification-event">
                        <span class="chat-message-item">Don’t worry Mathilda!</span>
                        <span class="chat-message-item">I already bought everything</span>
                        <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:29pm</time></span>
                    </div>
                </li>

                <li>
                    <div class="author-thumb">
                        <img src="{{ asset('img/avatar14-sm.jpg')}}" alt="author" class="mCS_img_loaded">
                    </div>
                    <div class="notification-event">
                        <span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
                        <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
                    </div>
                </li>
            </ul>
        </div>

        <form class="need-validation">

            <div class="form-group label-floating is-empty">
                <label class="control-label">Press enter to post...</label>
                <textarea class="form-control" placeholder=""></textarea>
                <div class="add-options-message">
                    <a href="#" class="options-message">
                        <svg class="olymp-computer-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-computer-icon')}}"></use></svg>
                    </a>
                    <div class="options-message smile-block">

                        <svg class="olymp-happy-sticker-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-happy-sticker-icon')}}"></use></svg>

                        <ul class="more-dropdown more-with-triangle triangle-bottom-right">
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/icon-chat1.png')}}" alt="icon">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/icon-chat2.png')}}" alt="icon">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/icon-chat3.png')}}" alt="icon">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/icon-chat4.png')}}" alt="icon">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/icon-chat5.png')}}" alt="icon">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/icon-chat6.png')}}" alt="icon">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/icon-chat7.png')}}" alt="icon">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/icon-chat8.png')}}" alt="icon">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/icon-chat9.png')}}" alt="icon">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/icon-chat10.png')}}" alt="icon">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/icon-chat11.png')}}" alt="icon">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/icon-chat12.png')}}" alt="icon">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/icon-chat13.png')}}" alt="icon">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/icon-chat14.png')}}" alt="icon">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/icon-chat15.png')}}" alt="icon">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/icon-chat16.png')}}" alt="icon">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/icon-chat17.png')}}" alt="icon">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/icon-chat18.png')}}" alt="icon">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/icon-chat19.png')}}" alt="icon">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/icon-chat20.png')}}" alt="icon">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/icon-chat21.png')}}" alt="icon">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/icon-chat22.png')}}" alt="icon">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/icon-chat23.png')}}" alt="icon">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/icon-chat24.png')}}" alt="icon">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/icon-chat25.png')}}" alt="icon">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/icon-chat26.png')}}" alt="icon">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('img/icon-chat27.png')}}" alt="icon">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </form>


    </div>

    <!-- ... end Window-popup-CHAT for responsive min-width: 768px -->






@endsection
