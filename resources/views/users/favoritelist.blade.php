@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-xs-4">
            <dvi class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->name }}</h3>
                </div>
                <div class="panel-body">
                    <img class="media-object img-responsive" src="{{ Gravatar::src($user->email, 500) }}" alt="">
                </div>
            </dvi>
            @include('user_follow.follow_button', ['user' => $user])
        </aside>
        <div class="col-xs-8">
            <ul class="nav nav-tabs nav-justified">
                <li role="presentation" class="{{ Request::is('user/' . $user->id) ? 'active' : '' }}"><a href="{{ route('users.show', ['id' => $user->id]) }}">Timeline,<span class="badge">{{ $count_microposts }}</span></a></li>
                <li role="presentation" class="{{ Request::is('user/*/followings') ? 'active' : '' }}"><a href="{{ route('users.followings', ['id' => $user->id]) }}">Followings<span class="badge">{{ $count_followings }}</span></a></li>
                <li role="presentation" class="{{ Request::is('user/*/followers') ? 'active' : '' }}"><a href="{{ route('users.followers', ['id' => $user->id]) }}">Followers<span class="badge">{{ $count_followers }}</span></a></li>
                <li role="presentation" class="{{ Request::is('micropost/*/favoritelist') ? 'active' : '' }}"><a href="{{ route('microposts.favoritelist', ['id' => $user->id]) }}">Favorite<span class="badge">{{ $count_favorites }}</span></a></li>
            </ul>
            @if (count($microposts) > 0)
                @include('microposts.microposts', ['microposts' => $microposts])
            @endif
        </div>
    </div>
@endsection