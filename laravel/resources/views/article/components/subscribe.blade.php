<?php /* .join-us-area - Start */ ?>
<section class="join-us-area style-2 black-effect research-join-us-area padding-top-125 md-pd-top-80 padding-bottom-125 md-pd-bottom-80">
    <div class="nav-container">
        <div class="row ">
            <div class="col-lg-12">
                <div class="join-us-content" style="background-image: url('{{ asset('assets/images/newsletter_banner.jpg') }}');">
                    <div class="left-bg-2 text-center">
                        <h2 class="title">Subscribe Our Newsletter</h2>
                        <p>To receive email releases, simply provide us with your email address below.</p>

                    </div>
                    <div class="subscribe-part">
                        <form class="subscribe-form" method="POST" action="{{ route('subscribe.store') }}">
                            @csrf
                            <input type="hidden" name="page" value="{{ $page ?? 'research' }}">
                            <input type="hidden" name="content_id" value="{{ $contentId ?? 0 }}">

                            {{-- Honeypot (hidden field bots usually fill) --}}
                            <input type="text" name="website" style="display:none">

                            <div class="from-group">
                                <input class="from-control" name="subscribe" type="text" placeholder="Your Email Address">
                            </div>
                            <div class="btn-wrapper btn-submit">
                                <button class="boxed-btn" type="submit">Subscribe</button>
                            </div>
                        </form>
                        
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>
<?php /* .join-us-area - End */ ?>