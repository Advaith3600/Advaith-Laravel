@if (count($errors) > 0)
    <div class="w3-container">
        <div id="id01" class="w3-modal" style="display: block;">
            <div class="w3-modal-content w3-animate-zoom">
                <header class="w3-container w3-red">
                    <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn">&times;</span>
                    <h2>Error!</h2>
                </header>
                <div class="w3-container w3-padding-16">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif

@if (Session::has('success'))
    <div class="w3-container">
        <div class="w3-modal" style="display: block;" id="id02">
            <div class="w3-modal-content w3-animate-zoom">
                <header class="w3-container w3-green">
                    <span onclick="document.getElementById('id02').style.display='none'" class="w3-closebtn">&times;</span>
                    <h2>Success!</h2>
                </header>
                <div class="w3-container w3-padding-16">
                    {{ Session::get('success') }}
                </div>
            </div>
        </div>
    </div>
@endif