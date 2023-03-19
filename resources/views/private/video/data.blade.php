<div class="card">
    <div class="row">


        @foreach ($result as $ddresult)
        @php
        $url = $ddresult->link_video;
        parse_str(parse_url($url, PHP_URL_QUERY), $params);
        $video_id = $params["v"];

        @endphp
        <div class="col-sm-4 mb-1">
            <p>
                <a href="#"><span class="badge bg-blue-grey pull-right" style="margin-left: 5px;">{{cek_date_ddmmyyyy_his_v1($ddresult->updated_at)}}</span></a>
                <a href="#" class="btn btn-sm btn-danger pull-right" id="tombol-hapus" data-url="{{ route('video.destroy',['video' => $ddresult->id_galeri_video,'myReload' =>'slideShowData'])}}" title="Hapus Data" style="margin-left: 5px;">
                    <i class="fa fa-trash"></i>
                </a>
            </p>

            <iframe style="height: 170px; width: 370px;" class="img-thumbnail" src=" https://www.youtube.com/embed/{{$video_id}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        @endforeach
        @if (count($result) ==0)
        <div class="container">
            <div class="bs-callout-danger callout-border-left callout-bordered mt-1 p-1">
                <h5 class="danger">Data Kosong !</h5>
            </div>
        </div>
        @endif

    </div>
</div>