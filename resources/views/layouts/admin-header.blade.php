<div class="admin-header">
    <div class="container h-100 d-flex justify-content-between align-items-center">
        <ul class="d-flex align-items-center nav">
            @switch($route ?? null)
                @case('person')
                    <li><a href="{{ route('person-management') }}">@lang('contents.pm-nav')</a></li>
                    <li class="m-l-20"><a href="{{ route('persons.create') }}">@lang('contents.create-person-nav')</a></li>
                    <li class="m-l-20"><a href="{{ route('parents.create') }}">@lang('contents.create-parent-nav')</a></li>
                    @break
                @case('user')
                    <li><a href="{{ route('users.management') }}">@lang('contents.um-nav')</a></li>
                    <li class="m-l-20"><a href="{{ route('users.create') }}">@lang('contents.create-user-nav')</a></li>
                    @break
                @default
                    <li><a href="{{ route('users.management') }}">@lang('contents.um-nav-nav')</a></li>
                    <li class="m-l-20"><a href="{{ route('person-management') }}">@lang('contents.pm-nav')</a></li>
            @endswitch
        </ul>
        <div class="d-flex align-items-center">
            {{ Form::select('pick-language', ['en' => 'en', 'vi' => 'vi'], session('lang') ?? 'en', ['class' => 'custom-select mr-3', 'id' => 'pick-language']) }}
            <a href="{{ route('logout') }}" class="text-no-wrap">@lang('contents.logout-nav')</a>
        </div>
    </div>
</div>

<script>
    $('#pick-language').on('change', function () {

        const lang = this.value;

        $.ajax({
            url: '{{ route('set.language') }}',
            method: 'post',
            data: {
                lang
            },
            success: function (res) {
                location.reload();
            }
        });
    })
</script>
