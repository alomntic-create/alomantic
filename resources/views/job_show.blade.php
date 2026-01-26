<x-app-layout>
    <link href="{{ asset('css/job_show.css') }}" rel="stylesheet" />


    <section class="project-section">
        <div class="project-description">
            <h2>تفاصيل المشروع</h2>
            <p>
                {{$job->description}}

            </p>
        </div>
        <div class="project-meta">
            <div><i class="fas fa-user"></i> العميل: {{$job->customer}}</div>
            <div><i class="fas fa-map-marker-alt"></i> {{$job->location}}</div>
        </div>
    </section>

    <!-- معرض الصور -->
    <section class="gallery">

        @foreach($job->media as $image)
            <img src="{{asset('storage/'.$image->url)}}" alt="">
        @endforeach
    </section>

    <!-- Lightbox -->
    <div class="lightbox" id="lightbox">
        <img src="" alt="">
    </div>



    <!-- مشاريع مشابهة -->
{{--    <section class="related-projects">--}}
{{--        <h2>مشاريع مشابهة</h2>--}}
{{--        <div class="cards">--}}
{{--            <div class="card">--}}
{{--                <img src="https://picsum.photos/id/1070/400/250" alt="">--}}
{{--                <div><h4>واجهة محل 1</h4></div>--}}
{{--            </div>--}}
{{--            <div class="card">--}}
{{--                <img src="https://picsum.photos/id/1080/400/250" alt="">--}}
{{--                <div><h4>واجهة محل 2</h4></div>--}}
{{--            </div>--}}
{{--            <div class="card">--}}
{{--                <img src="https://picsum.photos/id/1090/400/250" alt="">--}}
{{--                <div><h4>واجهة محل 3</h4></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    <script src="{{asset('js/job_show.js')}}"></script>--}}

</x-app-layout>
