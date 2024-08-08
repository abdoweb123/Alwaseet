<div>
    <section class="navigation-section short-nav d-flex justify-content-center align-items-center mb-0">
        <div class="text-center d-flex justify-content-center align-items-center">
            <a href="{{ route('home') }}">{{ __('dash.home') }}</a>
            <span><i style="font-size: medium; color: white;" class="fa-solid fa-angle-{{lang('en') ? 'right': 'left'}} mx-5"></i></span>
            <a href="{{ route('categories') }}">{{ __('dash.categories') }}</a>
            <span><i style="font-size: medium; color: white;" class="fa-solid fa-angle-{{lang('en') ? 'right': 'left'}} mx-5"></i></span>
            <a href="contact.html">{{ $category['title_' . lang()] }}</a>
        </div>
    </section>

    <section class="info">
        <div class="container">
            <ul class="nav nav-pills mb-3 d-flex tab-menu" id="pills-tab" role="tablist">
                @foreach ($categories as $sub_category)
                <li class="nav-item" role="presentation">
                    <button wire:click='serviceGet("{{ $sub_category->id }}")' class="nav-link {{ $selected_category_id == $sub_category->id ? 'active' : '' }} tab-item" id="pills-id-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-id" type="button" role="tab" aria-controls="pills-id"
                        aria-selected="{{ $selected_category_id == $sub_category->id }}">
                        {{ $sub_category['title_'.lang()] }}
                    </button>
                </li>
                @endforeach
            </ul>
            <div class="tab-content mt-5" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-id" role="tabpanel" aria-labelledby="pills-id-tab"
                    tabindex="0">
                    <div class="row">
                        @foreach ($services as $service)
                        <div class="col-lg-6 tab-item-content">
                            <a class="id-item" href="{{ route('services_show', $service->id) }}">
                                <div class="info-content-box">
                                    <h4 style="height: 85px;">{{ $service['title_'.lang()] }}</h4>
                                    <p>{{ $service->category['title_'.lang()] }}</p>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
