<div class="card ">

                    <div class="card-body ">
                        @if(!auth()->user()->avatar)
                        <img class="mx-auto d-block img-thumbnail" src="/img/man.jpg" width="130">
                        @endif
                        @if(auth()->user()->avatar && !auth()->user()->fb_id)
                        <img src="{{ Storage::url(auth()->user()->avatar) }}" style="width:60%" alt="">
                        @endif
                        @if(auth()->user()->fb_id)
                        <img src="{{ auth()->user()->avatar }}" style="width:60%" alt="">
                        @endif
                        <p class="text-center"><b>{{ auth()->user()->name }}</b></p>
                    </div>
                    <hr style="border:2px solid blue;">
                    <div class="vertical-menu">
                        <a href="#">Dashboard</a>
                        <a href="{{ route('profile') }}" class="{{ request()->is('profile')?'active':'' }}">Profile</a>
                        <a href="{{ route('ads.create') }}" class="{{ request()->is('ads/create')?'active':'' }}">Create ads</a>
                        <a href="{{ route('ads.index') }}" class="{{ request()->is('ads')?'active':'' }}">Published ads</a>
                        <a href="{{ route('pending.ad') }}" class="{{ request()->is('pending.ad')?'active':'' }}">Pending ads</a>
                        <a href="{{ route('saved.ad') }}" class="{{ request()->is('saved.ad')?'active':'' }}">Saved Ads</a>

                        <a href="{{ route('messages') }}" class="{{ request()->is('messages')?'active':'' }}">Message</a>
                    </div>

                </div>