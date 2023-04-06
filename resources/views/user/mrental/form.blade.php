<div class="form-row" >
    <div class="col-md-4 mb-3">
        <label for="validationServer01">Title<span style="color: red;"> *</span></label>
        <input type="text" class="form-control" id="title" placeholder="Title" value="{{ $item?$item->title:''}}" required name="title">
    </div>

    <div class="col-md-4 mb-3">

        <label for="price">How much is the monthly rent?<span style="color: red;"> *</span></label>
        <input type="number" class="form-control" id="price" placeholder="Price" name="price" value="{{ $item ? $item->price : ''}}" required>
    </div>
    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label>Property Type (m <sup>2</sup>)</label><br>
            {{-- <input type="text" class="" id="validationServer06" placeholder="" value="" required name="type"> --}}
            <select class="custom-select type"  name="type" id="type">
                <option value="Home" {{isset($features) ? ($features['type'] == "Home"?'selected': ''): ''}}>Home</option>
                <option value="Land" {{isset($features) ? ($features['type'] == "Land" ? 'selected' : '' ): ''}}>Land</option>
            </select>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <label for="deposit">How much is the security deposit?</label>
        <input type="number" class="form-control" id="deposit" placeholder="Deposit" name="deposit" value="{{isset($features) ? $features['deposit'] : ''}}">
    </div>

    <div class="col-md-4 mb-3" id="durationLabel">
        <label for="duration">Lease Duration <span>(per Year)</span></label>
        <input type="number" class="form-control" id="duration" placeholder="Lease Duration" value="{{isset($features) ? $features['duration'] : ''}}" name="duration">
    </div>

    <div class="col-md-4 mb-3">
        <label for="area">Area of the property</label>
        <input type="number" class="form-control" id="area" placeholder="Area" value="{{isset($features) ? $features['area'] : ''}}" name="area" >
    </div>

    <div class="col-md-4 mb-3" id="bedroomLabel">
        <label for="bedroom">Number of Bedroom</label>
        <input type="number" class="form-control" id="bedroom" placeholder="Bedroom" value="{{isset($features) ? $features['bedroom'] : ''}}" name="bedroom">
    </div>

    <div class="col-md-4 mb-3" id="bathroomLabel">
        <label for="bathroom">Number of Bathroom</label>
        <input type="number" class="form-control" id="bathroom" placeholder="Bathroom" value="{{isset($features) ? $features['bathroom'] : ''}}" name="bathroom">
        {{-- <div class="valid-feedback">
          Looks good!
        </div> --}}
    </div>

    <div class="col-md-4 mb-3" id="livingroomLabel">
        <label for="livingroom">Number of Living Room</label>
        <input type="number" class="form-control" id="livingroom" placeholder="Living room" value="{{isset($features) ? $features['livingroom'] : ''}}" name="livingroom">
        {{-- <div class="valid-feedback">
          Looks good!
        </div> --}}
    </div>

    <div class="col-md-4 mb-3" id="kitchenLabel">
        <label for="kitchen">Number of Kitchen</label>
        <input type="number" class="form-control" id="kitchen" placeholder="Kitchen" value="{{isset($features) ? $features['kitchen'] : ''}}" name="kitchen">
        {{-- <div class="valid-feedback">
          Looks good!
        </div> --}}
    </div>

    <div class="col-md-4 mb-3" id="rent_dateLabel">
        <label for="rent_date">Date available for rent</label>
        <input type="date" class="form-control" id="rent_date" placeholder="Date Available " value="{{isset($features) ? $features['rent_date'] : ''}}" name="rent_date">
        {{-- <div class="valid-feedback">
          Looks good!
        </div> --}}
    </div>

    <div class="col-md-4 mb-3" id="no_of_storiesLabel">
        <label for="no_of_stories" >Number of stories</label>
        <input type="number" class="form-control" id="no_of_stories" placeholder="No of stories" value="{{isset($features) ? $features['no_of_stories'] : ''}}" name="no_of_stories">
        {{-- <div class="valid-feedback">
          Looks good!
        </div> --}}
    </div>

    <div class="col-md-4 mb-3" id="road_widthLabel">
        <label for="road_width">Road width</label>
        <input type="text" class="form-control" id="road_width" placeholder="Road width" value="{{isset($features) ? $features['road_width'] : ''}}" name="road_width">
        {{-- <div class="valid-feedback">
          Looks good!
        </div> --}}
    </div>
    <div class="col-md-4 mb-3" id="parkingLabel">
        <label for="parking">Is parking available?</label>
        <select class="form-control" name="parking" id="parking">
            <option value="{{null}}">Select Option</option>
            <option value="yes"{{isset($features) ? ($features['parking'] == "yes"?'selected': ''): ''}}>Yes</option>
            <option value="no"{{isset($features) ? ($features['parking'] == "no"?'selected': ''): ''}}>No</option>
        </select>
{{--        <input type="text" class="form-control" id="parking" placeholder="Parking" value="{{isset($features) ? $features['parking'] : ''}}" name="parking">--}}
        {{-- <div class="valid-feedback">
          Looks good!
        </div> --}}
    </div>


    <div class="col-md-6 mb-3" id="imageDiv">
        <label for="image">Images of the property <span class="text-danger">*</span></label>
        <div class="file-section">
            <button class="btn  btn-outline-primary mr-2 " id="file-upload"><i class="fa-solid fa-upload"></i>Attach File
            </button>
            <input type="file" class="" multiple name="files[]" id="file-upload-hidden" @if(isset($item) && $item->photo_url)  @else required @endif style="display:none"  accept="image/png, image/gif, image/jpeg">
        </div>
    </div>
    <span id="message"></span>
    @if(isset($item) && $item->getMedia('listings') != NULL)
        <div class="d-flex align-items-center flex-wrap">
            <table class="table table-separate table-head-custom table-checkable" id="kt_datatable_2">
                <tbody>
                @php
                    $mimeArray = ['image/jpeg','image/jpg','image/png','image/gif'];
                @endphp
                @if($item->getMedia('listings') != NULL)
                    @foreach($item->getMedia('listings') as $key=>$document)
                        <tr class="file-row">
                            <td class="text-primary">File {{$key+1}}</td>
                            <td class="">
                                @if( in_array($document->mime_type,$mimeArray))
                                    <div class="text-center">
                                        <img src="{{$document->getFullUrl()}}" alt="DOC"
                                             class="img w-25 h-25 img-fluid">
                                    </div>
                                @else
                                    <a target="_blank" class=""
                                       href="{{$document->getFullUrl()}}">{{$document->getFullUrl()}}</a>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-danger btn-sm deleteFile"
                                        data-model-id="{{$item->id}}" data-id="{{$document->id}}"
                                        title="Remove Image"><i
                                        class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                        </td>
                        </tr>

                </tbody>
            </table>
        </div>
    @endif

</div>
<div class="form-row">
    <div class="col-md-6 my-2">
        <label for="video">Video Url</label><br>
        <input type="file" name="video_url" class="form-control w-75" id="video"
               onchange="file(event)" accept="video/mp4,video/x-m4v,video/*"><br>
        <video src="{{$item ? $item->getImage('video'): ''}}" style="display: none" id="video-create" class="w-50 h-50" controls>
        </video>
    </div>
</div>

<div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Describe the property</label>
        <textarea class="form-control desc" id="exampleFormControlTextarea1" rows="4" name="description">{{$item? $item->description : ''}}</textarea>
    </div>
</div>

<h2 class="mt-3 mb-3">Address Details</h2>

<div id="map" style="height: 280px;"></div>
<script>
    var map = L.map('map');
    map.setView([28.2096, 83.9856], 14);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
        maxZoom: 18,
    }).addTo(map);
    var popup = L.popup();

    function onMapClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent("You clicked the map at " + e.latlng.toString())
            .openOn(map);

        $('#longitude').val(e.latlng.lng);
        $('#latitude').val(e.latlng.lat);

        // Send a request to the Nominatim reverse geocoding service
        fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${e.latlng.lat}&lon=${e.latlng.lng}`)
            .then(response => response.json())
            .then(data => {
                // Parse the response data to get the location address
                var address = data.display_name;

                $('#location').val(address.split(",")[1]+','+address.split(",")[2]+ ',' +address.split(",")[3]+ ',' +address.split(",")[4]+','+address.split(",")[5]);
               // console.log(address);
            })
            .catch(error => console.error(error));

    }
    map.on('click', onMapClick);
</script>
<div class="form-row mt-4">
    <div class="col-md-4 mb-3">
        <label for="location">Location <span class="text-danger">*</span></label>
        <input type="text" class="form-control w-100" id="location" placeholder="Location" required readonly name="location" value="{{$item? $item->location: ''}}">
        <div class="">
            {{-- Please provide a valid state. --}}
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <label for="latitude">Latitude <span class="text-danger">*</span></label>
        <input type="text" class="form-control w-100" id="latitude" placeholder="Latitude"required readonly name="latitude" value="{{$item? $item->latitude: ''}}">
        <div class="">
            {{-- Please provide a valid zip. --}}
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <label for="longitude">Longitude <span class="text-danger">*</span></label>
        <input type="text" class="form-control w-100" id="longitude" placeholder="Longitude" required readonly name="longitude" value="{{$item? $item->longitude: ''}}">
        <div class="">
            {{-- Please provide a valid city. --}}
        </div>
    </div>
</div>

<script>

    var file = function (event) {
        var trailer = document.getElementById('video-create');
        trailer.src = URL.createObjectURL(event.target.files[0]);
        $('#video-create').css('display', '');
    };

</script>
